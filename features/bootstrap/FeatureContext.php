<?php
use Fake\FakeGameRepository;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Application\GetGameQuery;
use Application\StartGameHandler;
use Application\GetGameHandler;
use Application\MakeMoveCommand;
use Application\MakeMoveHandler;

use Application\Move;
use Application\Game;
use Application\Player;
use Application\Board;
use Application\StartGameCommand;
use Application\GameFactory;
use Ramsey\Uuid\UuidInterface;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\Uuid;
use Repository\GameRepositoryStub;
use Repository\MoveGeneratorStub;
//use Repository\MoveGeneratorFactoryStub;
//use PHPUnit_Framework_Assert as Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var UuidInterface
     */
    private $gameId;

    /**
     * @var GameRepositoryStub
     */
    private $gameRepository;

    //const GAME_ID = '1234';

    /**
     * @var gameRepositoryStub
     */
    private $moveGenerator;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->gameId = Uuid::uuid4();
        $this->moveGenerator = new MoveGeneratorStub([
            new Move(2,2)
        ]);
    }

    /**
     * @Given I have not started a game yet
     */
    public function iHaveNotStartedAGameYet()
    {
       $this->gameRepository = new GameRepositoryStub([]);
    }

    /**
     * @When I start a game as player :playerName
     */
    public function iStartAGameAsPlayer($playerName)
    {
        $command = new StartGameCommand();
        $command->gameId = $this->gameId;
        $command->playerName= $playerName;

        $handler = new StartGameHandler(
            $this->gameRepository,
            new UUidFactory,
            new GameFactory,
            $this->moveGenerator
        );
        $handler->handle($command
        );
    }

    /**
     * @Then I should see an empty board
     */
    public function iShouldSeeAnEmptyBoard()
    {
        $query = new GetGameQuery();
        $query->gameId = $this->gameId;
        $handler = $this->createGetGameHandler();
        $result = $handler->handle($query);
        Assert:assert($result->getBoard()->getNumberOfSymbols()=== 0);
    }


    /**
     * @Given I have started a game as player :playerName
     */
    public function iHaveStartedAGameAsPlayer($playerName)
    {
        $opponentName = $playerName === 'X' ? 'O' : 'X';

        $this->gameRepository = new GameRepositoryStub([new Game(
            $this->gameId,
            new Player($playerName),
            new Board(),
            new Player($opponentName)

        )]);

     //   throw new PendingException();

    }

    /**
     * @When I make a move
     */
    public function iMakeAMove()
    {
        $command = new MakeMoveCommand();
        $command->gameId = $this->gameId->toString();
        $command->x = 0;
        $command->y = 0;
        $handler = new MakeMoveHandler($this->gameRepository, new UuidFactory(), $this->moveGenerator);
        $handler->handle($command);
    }

    /**
     * @Then I should see a board with one symbol on it
     */
    public function iShouldSeeABoardWithOneSymbolOnIt()
    {
        $query = new GetGameQuery();
        $query->gameId = $this->gameId;
        $handler = $this->createGetGameHandler();
        $result = $handler->handle($query);
       // print_r($result->getBoard());
        Assert:assert($result->getBoard()->getNumberOfSymbols()>= 1);
    }

    private function createGetGameHandler(){
        return new GetGameHandler ( $this->gameRepository, new UuidFactory());
    }

    /**
     * @Then I should see a board with two symbols on it
     */
    public function iShouldSeeABoardWithTwoSymbolsOnIt()
    {
        $query = new GetGameQuery();
        $query->gameId = $this->gameId;
        $handler = $this->createGetGameHandler();
        $result = $handler->handle($query);
        // print_r($result->getBoard());
        Assert:assert($result->getBoard()->getNumberOfSymbols()=== 2);
    }
}
