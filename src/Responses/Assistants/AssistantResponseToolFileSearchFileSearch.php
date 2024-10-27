<?php

declare(strict_types=1);

namespace OpenAI\Responses\Assistants;

use OpenAI\Contracts\ResponseContract;
use OpenAI\Responses\Concerns\ArrayAccessible;
use OpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{max_num_results: null|int, ranking_options: null|array{ranker: string, score_threshold: float}}>
 */
final class AssistantResponseToolFileSearchFileSearch implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{type: string}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public ?int $max_num_results,
        public ?AssistantResponseToolFileSearchFileSearchRankingOptions $ranking_options,
    )
    {
    }

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param array{max_num_results: int, ranking_options: null|array{ranker: string, score_threshold: float}} $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['max_num_results'] ?? null,
            empty($attributes['ranking_options']) ? null : AssistantResponseToolFileSearchFileSearchRankingOptions::from($attributes['ranking_options']),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'max_num_results' => $this->max_num_results,
            'ranking_options' => $this->ranking_options?->toArray(),
        ];
    }
}
