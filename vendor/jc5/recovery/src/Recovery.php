<?php

namespace PragmaRX\Recovery;

use PragmaRX\Random\Random;
use JsonException;

/**
 * Class Recovery
 */
class Recovery
{
    protected array $codes = [];

    protected int $count = 8;

    protected int $blocks = 2;

    protected int $chars = 10;

    protected $random;

    protected string $blockSeparator = '-';

    private string $collectionFunction = 'collect';

    /**
     * Recovery constructor.
     *
     * @param Random $random
     */
    public function __construct(Random $random = null)
    {
        if (is_null($random)) {
            $random = new Random();
        }

        $this->random = $random;
    }

    /**
     * Set to alpha codes.
     *
     * @return Recovery
     */
    public function alpha(): Recovery
    {
        $this->random->alpha();

        return $this;
    }

    /**
     * Generate the recovery codes.
     *
     * @return array
     */
    protected function generate(): array
    {
        $this->reset();

        foreach (range(1, $this->getCount()) as $counter) {
            $this->codes[] = $this->generateBlocks();
        }

        return $this->codes;
    }

    /**
     * Generate all blocks.
     *
     * @return string
     */
    protected function generateBlocks(): string
    {
        $blocks = [];

        foreach (range(1, $this->getBlocks()) as $counter) {
            $blocks[] = $this->generateChars();
        }

        return implode($this->blockSeparator, $blocks);
    }

    /**
     * Generate random chars.
     *
     * @return string
     */
    protected function generateChars(): string
    {
        return $this->random->size($this->getChars())->get();
    }

    /**
     * Check if codes must be generated.
     *
     * @return bool
     */
    protected function mustGenerate(): bool
    {
        return count($this->codes) == 0;
    }

    /**
     * Set lowercase codes state.
     *
     * @param bool $state
     * @return Recovery
     */
    public function lowercase($state = true): self
    {
        $this->random->lowercase($state);

        return $this;
    }

    /**
     * Set the block separator.
     *
     * @param string $blockSeparator
     * @return Recovery
     */
    public function setBlockSeparator($blockSeparator): self
    {
        $this->blockSeparator = $blockSeparator;

        return $this;
    }

    /**
     * Set the collection function.
     *
     * @param string $collectionFunction
     * @return Recovery
     */
    public function collectionFunction($collectionFunction): self
    {
        $this->collectionFunction = $collectionFunction;

        return $this;
    }

    /**
     * Set uppercase codes state.
     *
     * @param bool $state
     * @return Recovery
     */
    public function uppercase($state = true): self
    {
        $this->random->uppercase($state);

        return $this;
    }

    /**
     * Set mixedcase codes state.
     *
     * @return Recovery
     */
    public function mixedcase(): self
    {
        $this->random->mixedcase();

        return $this;
    }

    /**
     * Set to numeric codes.
     *
     * @return Recovery
     */
    public function numeric(): self
    {
        $this->random->numeric();

        return $this;
    }

    /**
     * Get an array of recovery codes.
     *
     * @return array
     */
    public function toArray(): array
    {
        if ($this->mustGenerate()) {
            return $this->generate();
        }

        return $this->getCodes();
    }

    /**
     * Get a collection of recovery codes.
     *
     * @return array
     * @throws \Exception
     */
    public function toCollection(): array
    {
        if (function_exists($this->collectionFunction)) {
            return call_user_func($this->collectionFunction, $this->toArray());
        }

        throw new \Exception(
            "Function {$this->collectionFunction}() was not found. " .
            "You probably need to install a suggested package?"
        );
    }

    /**
     * Get a json of recovery codes.
     *
     * @return string
     * @throws JsonException
     */
    public function toJson(): string
    {
        return json_encode($this->toArray(), JSON_THROW_ON_ERROR);
    }

    /**
     * Get the blocks size.
     *
     * @return int
     */
    public function getBlocks(): int
    {
        return $this->blocks;
    }

    /**
     * Get the chars count.
     *
     * @return int
     */
    public function getChars(): int
    {
        return $this->chars;
    }

    /**
     * Get the codes.
     *
     * @return array
     */
    public function getCodes(): array
    {
        return $this->codes;
    }

    /**
     * Get the codes count.
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Reset generated codes.
     *
     */
    protected function reset(): void
    {
        $this->codes = [];
    }

    /**
     * Set the blocks size.
     *
     * @param int $blocks
     * @return Recovery
     */
    public function setBlocks(int $blocks): self
    {
        $this->blocks = $blocks;

        $this->reset();

        return $this;
    }

    /**
     * Set the chars count.
     *
     * @param int $chars
     * @return Recovery
     */
    public function setChars(int $chars): self
    {
        $this->chars = $chars;

        $this->reset();

        return $this;
    }

    /**
     * Set the codes count.
     *
     * @param int $count
     * @return Recovery
     */
    public function setCount(int $count): self
    {
        $this->count = $count;

        $this->reset();

        return $this;
    }
}
