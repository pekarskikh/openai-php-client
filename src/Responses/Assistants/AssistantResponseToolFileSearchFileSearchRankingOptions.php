<?php

declare(strict_types=1);

namespace OpenAI\Responses\Assistants;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{ranker: null|string, score_threshold: float}>
 */
final class AssistantResponseToolFileSearchFileSearchRankingOptions implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{ranker: null|string, score_threshold: float}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public ?string $ranker,
        public float $score_threshold,
    )
    {
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param array{ranker: string, score_threshold: float} $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['ranker'] ?? null,
            $attributes['score_threshold'],
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'ranker' => $this->ranker,
            'score_threshold' => $this->score_threshold,
        ];
    }
}
