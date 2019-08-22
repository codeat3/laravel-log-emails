<?php

namespace Codeat3\LaravelLogEmails\Tests;

use Codeat3\LaravelLogEmails\LaravelLogEmails;
use Codeat3\LaravelLogEmails\LaravelLogEmailsServiceProvider;
use Codeat3\LaravelLogEmails\Models\Email;
use Orchestra\Testbench\TestCase;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelLogEmailsServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaravelLogEmails' => LaravelLogEmails::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        include_once __DIR__ . '/../database/migrations/create_emails_table.php.stub.php';
        (new \CreateEmailsTable())->up();
    }

    /** @test */
    public function it_can_access_the_database()
    {
        $email = new Email();

        $email->from = 'fakefrom';
        $email->to = 'faketo';
        $email->cc = 'fakecc';
        $email->bcc = 'fakebcc';
        $email->subject = 'fake subject';
        $email->body = 'fake body';
        $email->headers = 'fake headers';
        $email->attachments = null;

        $email->save();

        $newEmail = Email::find($email->id);

        $this->assertSame($newEmail->to, 'faketo');
    }
}
