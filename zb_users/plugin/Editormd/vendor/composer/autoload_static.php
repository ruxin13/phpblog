<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaf8e0d2d268e2f3dd69d2bba2b789482
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'League\\HTMLToMarkdown\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'League\\HTMLToMarkdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/html-to-markdown/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'Parsedown' => 
            array (
                0 => __DIR__ . '/..' . '/erusev/parsedown',
            ),
        ),
    );

    public static $classMap = array (
        'League\\HTMLToMarkdown\\Configuration' => __DIR__ . '/..' . '/league/html-to-markdown/src/Configuration.php',
        'League\\HTMLToMarkdown\\ConfigurationAwareInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/ConfigurationAwareInterface.php',
        'League\\HTMLToMarkdown\\Converter\\BlockquoteConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/BlockquoteConverter.php',
        'League\\HTMLToMarkdown\\Converter\\CodeConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/CodeConverter.php',
        'League\\HTMLToMarkdown\\Converter\\CommentConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/CommentConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ConverterInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ConverterInterface.php',
        'League\\HTMLToMarkdown\\Converter\\DefaultConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/DefaultConverter.php',
        'League\\HTMLToMarkdown\\Converter\\DivConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/DivConverter.php',
        'League\\HTMLToMarkdown\\Converter\\EmphasisConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/EmphasisConverter.php',
        'League\\HTMLToMarkdown\\Converter\\HardBreakConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/HardBreakConverter.php',
        'League\\HTMLToMarkdown\\Converter\\HeaderConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/HeaderConverter.php',
        'League\\HTMLToMarkdown\\Converter\\HorizontalRuleConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/HorizontalRuleConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ImageConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ImageConverter.php',
        'League\\HTMLToMarkdown\\Converter\\LinkConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/LinkConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ListBlockConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ListBlockConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ListItemConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ListItemConverter.php',
        'League\\HTMLToMarkdown\\Converter\\ParagraphConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/ParagraphConverter.php',
        'League\\HTMLToMarkdown\\Converter\\PreformattedConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/PreformattedConverter.php',
        'League\\HTMLToMarkdown\\Converter\\TextConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/Converter/TextConverter.php',
        'League\\HTMLToMarkdown\\Element' => __DIR__ . '/..' . '/league/html-to-markdown/src/Element.php',
        'League\\HTMLToMarkdown\\ElementInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/ElementInterface.php',
        'League\\HTMLToMarkdown\\Environment' => __DIR__ . '/..' . '/league/html-to-markdown/src/Environment.php',
        'League\\HTMLToMarkdown\\HtmlConverter' => __DIR__ . '/..' . '/league/html-to-markdown/src/HtmlConverter.php',
        'League\\HTMLToMarkdown\\HtmlConverterInterface' => __DIR__ . '/..' . '/league/html-to-markdown/src/HtmlConverterInterface.php',
        'Parsedown' => __DIR__ . '/..' . '/erusev/parsedown/Parsedown.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaf8e0d2d268e2f3dd69d2bba2b789482::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaf8e0d2d268e2f3dd69d2bba2b789482::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitaf8e0d2d268e2f3dd69d2bba2b789482::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitaf8e0d2d268e2f3dd69d2bba2b789482::$classMap;

        }, null, ClassLoader::class);
    }
}
