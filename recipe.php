<?php
/**
 * This file is part of Reel.
 * @auth lupeng
 */
declare(strict_types=1);

namespace Deployer;

use Closure;
use RuntimeException;

require 'recipe/common.php';

add('recipes', ['mini']);

/**
 * @param $command
 * @param array $options
 * @return Closure
 */
function artisan($command, array $options = []): Closure
{
    return static function () use ($command, $options) {
        // Ensure we warn or fail when a command relies on the ".env" file.
        if (in_array('failIfNoEnv', $options, true) && !test('[ -s {{release_or_current_path}}/.env ]')) {
            throw new RuntimeException('Your .env file is empty! Cannot proceed.');
        }

        if (in_array('skipIfNoEnv', $options, true) && !test('[ -s {{release_or_current_path}}/.env ]')) {
            warning("Your .env file is empty! Skipping...</>");
            return;
        }

        $artisan = '{{release_or_current_path}}/bin/artisan';

        // Run the artisan command.
        $output = run("{{bin/php}} $artisan $command");

        // Output the results when appropriate.
        if (in_array('showOutput', $options, true)) {
            writeln("<info>$output</info>");
        }
    };
}

/**
 * @return Closure
 */
function envPublish(): Closure
{
    return static function () {
        on(select('env=dev'), function () {
            run('cp {{release_or_current_path}}/.env.develop {{release_or_current_path}}/.env');
        });
        on(select('env=production'), function () {
            run('cp {{release_or_current_path}}/.env.production {{release_or_current_path}}/.env');
        });
    };
}

/**
 * @param string $action
 * @return Closure
 */
function miniServer(string $action): Closure
{
    return static function () use ($action) {
        $commands = [
            'start' => 'sudo systemctl start reel.service',
            'stop' => 'sudo systemctl stop reel.service',
            'restart' => 'sudo systemctl restart reel.service',
            'reload' => 'sudo systemctl reload reel.service',
        ];
        $output = run($commands[$action] ?? '');
        writeln("<info>$output</info>");
    };
}

desc('Publish env file');
task('env:publish', envPublish());

desc('Start/Stop mini server');
task('mini:start', miniServer('start'));
task('mini:restart', miniServer('restart'));
task('mini:reload', miniServer('reload'));
task('mini:stop', miniServer('stop'));

/*
 * Generate keys.
 */
desc('Sets the application key');
task('artisan:key:generate', artisan('key:generate'));

/*
 * Storage
 */
desc('Creates the symbolic links configured for the application');
task('artisan:storage:link', artisan('storage:link'));

/*
 * View
 */
desc('Compiles all of the application\'s Blade templates');
task('artisan:view:cache', artisan('view:cache', ['min' => 5.6]));

desc('Clears all compiled view files');
task('artisan:view:clear', artisan('view:clear'));

/*
 * Database and migrations.
 */
desc('Runs the database migrations');
task('artisan:migrate', artisan('migrate --force', ['skipIfNoEnv', 'showOutput']));

desc('Rollbacks the last database migration');
task('artisan:migrate:rollback', artisan('migrate:rollback --force', ['skipIfNoEnv', 'showOutput']));
