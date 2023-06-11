<?php

namespace App\Shell\Task;

use Cake\Log\Log;
use Queue\Shell\Task\QueueTask;
use Queue\Shell\Task\QueueTaskInterface;

class QueueDemoTask extends QueueTask implements QueueTaskInterface {

    /**
     * @var int
     */
    public $timeout = 20;

    /**
     * @var int
     */
    public $retries = 1;

    /**
     * @param array $data The array passed to QueuedJobsTable::createJob()
     * @param int $jobId The id of the QueuedJob entity
     * @return void
     */
    public function run(array $data, $jobId) {
        Log::error('QueueDemoTask Log');
    }

}
