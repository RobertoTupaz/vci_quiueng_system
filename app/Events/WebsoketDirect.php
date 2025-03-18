<?php
    namespace App\Events;

    use Pusher\Pusher;

    require_once __DIR__ . '/../../vendor/autoload.php';

  class WebsoketDirect 
  {

    private $options = array(
      'cluster' => 'ap3',
      'useTLS' => true
    );

    private $pusher;
    public function __construct($data = null, $id = null) {
      $this->pusher = new Pusher(
        'b5da84cc28f6c1737da5',
        'ddc241b500b21a8b6edd',
        '1954226',
        $this->options,
      );

      $message = 'null';

      // $this->pusher->trigger('queues', 'active-updated', $message);
      $this->pusher->trigger('queues', 'queues-updated', [$data, $id]);

      // if($data == 'auth') {

      // } else {
        
      // }
    }

  }
?>