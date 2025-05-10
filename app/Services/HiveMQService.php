<?php

namespace App\Services;

use PhpMqtt\Client\MqttClient;
use PhpMqtt\Client\ConnectionSettings;

class HiveMQService
{
    protected $client;
    protected $server = 'aabac907927b442bb42be20a770563ea.s1.eu.hivemq.cloud'; // untuk production
    protected $port = 8883; // untuk production
    protected $clientId;

    public function __construct()
    {
        $this->clientId = 'laravel-client-' . uniqid();
    }

    public function connect()
    {
        $connectionSettings = (new ConnectionSettings())
            ->setUsername('mqttsiaudila')
            ->setPassword('Anisa@123')
            ->setKeepAliveInterval(60)
            ->setUseTls(true);
        $this->client = new MqttClient($this->server, $this->port, $this->clientId);

        // Clean session
        $this->client->connect($connectionSettings, true);
    }

    public function subscribe(string $topic, callable $callback)
    {
        $this->client->subscribe($topic, function (string $topic, string $message, bool $retained) use ($callback) {
            $callback($topic, $message);
        }, 0);
    }

    public function loop(int $duration = 1)
    {
        $this->client->loop($duration);
    }

    public function disconnect()
    {
        $this->client->disconnect();
    }

    public function publish(string $topic, string $message, int $qos = 0, bool $retain = false)
    {
        $this->client->publish($topic, $message, $qos, $retain);
    }
}
