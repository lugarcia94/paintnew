<?php

namespace MailPoet\Twig;

if (!defined('ABSPATH')) exit;


use MailPoet\Analytics\Analytics as AnalyticsGenerator;
use MailPoet\DI\ContainerWrapper;
use MailPoetVendor\Twig\Extension\AbstractExtension;
use MailPoetVendor\Twig\TwigFunction;

class Analytics extends AbstractExtension {
  public function getFunctions() {
    $analytics = ContainerWrapper::getInstance()->get(AnalyticsGenerator::class);
    return [
      new TwigFunction(
        'get_analytics_data',
        [$analytics, 'generateAnalytics'],
        ['is_safe' => ['all']]
      ),
      new TwigFunction(
        'is_analytics_enabled',
        [$analytics, 'isEnabled'],
        ['is_safe' => ['all']]
      ),
      new TwigFunction(
        'get_analytics_public_id',
        [$analytics, 'getPublicId'],
        ['is_safe' => ['all']]
      ),
      new TwigFunction(
        'is_analytics_public_id_new',
        [$analytics, 'isPublicIdNew'],
        ['is_safe' => ['all']]
      ),
    ];
  }
}
