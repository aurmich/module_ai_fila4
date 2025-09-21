<?php

declare(strict_types=1);

namespace Modules\AI\Actions;

<<<<<<< HEAD
use Exception;
// use function Codewithkyrian\Transformers\Pipelines\pipeline; // Package not installed
=======
<<<<<<< HEAD
use Exception;
use function Codewithkyrian\Transformers\Pipelines\pipeline;
=======
>>>>>>> origin/develop
>>>>>>> 901402b (.)
use Modules\AI\Contracts\SentimentAnalyzer;
use Modules\AI\Datas\SentimentData;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

use function Safe\error_log;

class BasicSentimentAnalyzer implements SentimentAnalyzer
{
    /**
<<<<<<< HEAD
     * {@inheritDoc}
     *
=======
<<<<<<< HEAD
     * {@inheritDoc}
     *
=======
     * @inheritDoc
     *
     * @param string $text
>>>>>>> origin/develop
>>>>>>> 901402b (.)
     * @return array<string,mixed>
     */
    public function analyze(string $text): array
    {
        // Basic sentiment analysis using simple text patterns
        $positiveWords = ['good', 'great', 'excellent', 'positive', 'happy'];
        $negativeWords = ['bad', 'poor', 'terrible', 'negative', 'unhappy'];

        $positiveCount = 0;
        $negativeCount = 0;

        foreach ($positiveWords as $word) {
            if (stripos($text, $word) !== false) {
                $positiveCount++;
            }
        }

        foreach ($negativeWords as $word) {
            if (stripos($text, $word) !== false) {
                $negativeCount++;
            }
        }

        $score = ($positiveCount - $negativeCount) / max(1, $positiveCount + $negativeCount);

        return [
            'label' => $score >= 0 ? 'POSITIVE' : 'NEGATIVE',
            'score' => abs($score),
            'warning' => 'Using basic sentiment analysis - install transformers for better accuracy',
        ];
    }
}

/**
 * Sentiment analysis action using either transformers or basic implementation.
 *
 * The transformers implementation requires the codewithkyrian/transformers package.
 * If not available, it falls back to a basic text pattern matching implementation.
 *
 * To enable the full functionality, install the package:
 *
 * ```bash
 * composer require codewithkyrian/transformers
 * ```
 *
 * Note: You may see IDE errors about undefined types/functions until the package
 * is installed. These can be safely ignored as the code will automatically fall
 * back to basic text analysis if the package is not available.
 */
class SentimentAction
{
    use QueueableAction;

    private SentimentAnalyzer $analyzer;

    public function __construct()
    {
        $this->analyzer = class_exists('Codewithkyrian\Transformers\Transformers')
            ? new TransformersSentimentAnalyzer
            : new BasicSentimentAnalyzer;
    }

    /**
     * Execute sentiment analysis on a text prompt.
     *
<<<<<<< HEAD
     * @param  string  $prompt  The text to analyze
=======
<<<<<<< HEAD
     * @param  string  $prompt  The text to analyze
=======
     * @param string $prompt The text to analyze
     * @return \Modules\AI\Datas\SentimentData
>>>>>>> origin/develop
>>>>>>> 901402b (.)
     */
    public function execute(string $prompt): SentimentData
    {
        try {
            $result = $this->analyzer->analyze($prompt);
<<<<<<< HEAD

            return SentimentData::from($result);
        } catch (Exception $e) {
=======
<<<<<<< HEAD

            return SentimentData::from($result);
        } catch (Exception $e) {
=======
            return SentimentData::from($result);
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            error_log('Sentiment analysis error: '.$e->getMessage());

            return SentimentData::from([
                'error' => $e->getMessage(),
                'status' => 'error',
            ]);
        }
    }
}

class TransformersSentimentAnalyzer implements SentimentAnalyzer
{
    private string $cacheDir = './../cache/models';

    /**
<<<<<<< HEAD
     * {@inheritDoc}
     *
=======
<<<<<<< HEAD
     * {@inheritDoc}
     *
=======
     * @inheritDoc
     *
     * @param string $text
>>>>>>> origin/develop
>>>>>>> 901402b (.)
     * @return array<string,mixed>
     */
    public function analyze(string $text): array
    {
        try {
            if (! class_exists('Codewithkyrian\Transformers\Transformers')) {
<<<<<<< HEAD
                throw new Exception('Transformers library not installed');
=======
<<<<<<< HEAD
                throw new Exception('Transformers library not installed');
=======
                throw new \Exception('Transformers library not installed');
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            }

            /**
             * @var class-string<\Codewithkyrian\Transformers\Transformers> $transformersClass
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
             *                                                              La variabile $transformers viene dichiarata più sotto e tipizzata correttamente.
             */
            $transformersClass = 'Codewithkyrian\Transformers\Transformers';
            if (! method_exists($transformersClass, 'setup')) {
                throw new Exception('Transformers setup method not found');
<<<<<<< HEAD
=======
=======
             * La variabile $transformers viene dichiarata più sotto e tipizzata correttamente.
             */
            $transformersClass = 'Codewithkyrian\Transformers\Transformers';
            if (! method_exists($transformersClass, 'setup')) {
                throw new \Exception('Transformers setup method not found');
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            }

            /** @var object|null $transformers */
            $transformers = $transformersClass::setup();
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
            if (! is_object($transformers)) {
                throw new Exception('Failed to initialize Transformers');
            }
            if (! method_exists($transformers, 'setCacheDir')) {
                throw new Exception('setCacheDir method not found on Transformers');
<<<<<<< HEAD
=======
=======
            if (!is_object($transformers)) {
                throw new \Exception('Failed to initialize Transformers');
            }
            if (!method_exists($transformers, 'setCacheDir')) {
                throw new \Exception('setCacheDir method not found on Transformers');
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            }
            $transformers->setCacheDir($this->cacheDir);
            if (method_exists($transformers, 'apply')) {
                $transformers->apply();
            }

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
            if (! function_exists('Codewithkyrian\\Transformers\\Pipelines\\pipeline')) {
                throw new Exception('Pipeline function not found');
            }

<<<<<<< HEAD
            $pipe = \Codewithkyrian\Transformers\Pipelines\pipeline('sentiment-analysis');
            if (! is_callable($pipe)) {
                throw new Exception('Failed to create sentiment analysis pipeline');
=======
            $pipe = pipeline('sentiment-analysis');
            if (! is_callable($pipe)) {
                throw new Exception('Failed to create sentiment analysis pipeline');
=======
            if (!function_exists('Codewithkyrian\\Transformers\\Pipelines\\pipeline')) {
                throw new \Exception('Pipeline function not found');
            }

            $pipe = \Codewithkyrian\Transformers\Pipelines\pipeline('sentiment-analysis');
            if (!is_callable($pipe)) {
                throw new \Exception('Failed to create sentiment analysis pipeline');
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            }

            $result = $pipe($text);
            Assert::isArray($result);

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 901402b (.)
            /** @var array<string, mixed> $analysisResult */
            $analysisResult = $result;

            return $analysisResult;
        } catch (Exception $e) {
<<<<<<< HEAD
=======
=======
            return $result;
        } catch (\Exception $e) {
>>>>>>> origin/develop
>>>>>>> 901402b (.)
            error_log('Transformers sentiment analysis failed: '.$e->getMessage());

            return [
                'error' => $e->getMessage(),
                'status' => 'error',
                'fallback' => true,
            ];
        }
    }
}
