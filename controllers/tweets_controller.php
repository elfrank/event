<?php
// app/controllers/example_controller.php
App::import('Vendor', 'oauth', array('file' => 'OAuth'.DS.'oauth_consumer.php'));

class TweetsController extends AppController {
    public $uses = array();
    var $helpers = array('Authake.Htmlbis', 'Form', 'Time');
    var $paginate = array(
                        'limit' => 10,
                        'order' => array(
                                         'Activity.created' => 'asc'
                                        )
                       );
                       
    public function twitter() {
        $consumer = $this->createConsumer();
        $requestToken = $consumer->getRequestToken('http://api.twitter.com/oauth/request_token', 'http://congreso.rebeet.com/tweets/twitter_callback');
        $this->Session->write('twitter_request_token', $requestToken);

        $this->redirect('http://twitter.com/oauth/authorize?oauth_token=' . $requestToken->key);
    }
	
/*
	public function admin_twitter()
	{
		$this->redirect('/tweets/twitter');
	}
	
*/
	public function index()
	{
	
	}
	
	public function admin_index()
	{
		$this->loadModel('TwitterAccounts');
		
		$accounts = $this->TwitterAccounts->query('SELECT * FROM twitter_accounts ORDER BY username ASC');
		
		$this->set('twitteraccounts', $accounts);
	}
	
	public function admin_delete()
	{
		echo 'hola';
	}
	

    public function twitter_callback() {
        $requestToken = $this->Session->read('twitter_request_token');
        $consumer = $this->createConsumer();
/*


        echo '<pre>';
        print_r($requestToken);
        echo '</pre>';


        echo '<pre>';
        print_r($consumer);
        echo '</pre>';
*/

        $accessToken = $consumer->getAccessToken('http://api.twitter.com/oauth/access_token', $requestToken);

/*
        echo '<pre>';
        print_r($consumer);
        echo '</pre>';

		echo $accessToken;
		
*/
		$this->Session->write('twitter_access_key', $accessToken->key);
		$this->Session->write('twitter_access_secret', $accessToken->secret);
		
		
		$this->loadModel('TwitterAccounts');
		
		$profile = $consumer->get($accessToken->key,$accessToken->secret,'http://api.twitter.com/1/account/verify_credentials.json');
		
		$profile = json_decode($profile,1);
		
		//echo $profile['screen_name'];
		$resultados = $this->TwitterAccounts->findByUsername($profile['screen_name']);
		
		//print_r($resultados);
		
		if(count($resultados['TwitterAccounts']) == 0)
		{
			//es nuevo
			$data = array();
			$data['TwitterAccounts']['username'] = $profile['screen_name'];
			$data['TwitterAccounts']['profile_pic'] = $profile['profile_image_url'];
			$data['TwitterAccounts']['access_token'] = $accessToken->key;
			$data['TwitterAccounts']['access_token_secret'] = $accessToken->secret;
			
			$this->TwitterAccounts->save($data);
			
		}
		else
		{
			$resultados['TwitterAccounts'][0]['access_token'] = $accessToken->key;
			$resultados['TwitterAccounts'][0]['access_token_secret'] = $accessToken->secret;
			
			$this->TwitterAccounts->save($resultados);
		}
		
		
		//echo $accessToken->key . '  -  '.$accessToken->secret .'<br>';
		
        //$result = $consumer->post($accessToken->key, $accessToken->secret, 'http://api.twitter.com/1/statuses/update.json', array('status' => 'hello world! @perrohunter'));
        
        $this->redirect('/admin/tweets');
        
        
       /*
 echo '<pre>';
        print_r($result);
        echo '</pre>';
*/
    }

    public function twitter_test() {
        
        
        $accessKey = $this->Session->read('twitter_access_key');
        $accessSecret = $this->Session->read('twitter_access_secret');
        
        $consumer = $this->createConsumer();
        
        echo $accessKey . '  -  '.$accessSecret .'<br>';

	$this->loadModel('TwitterAccounts');
		
		$profile = $consumer->get($accessToken->key,$accessToken->secret,'http://api.twitter.com/1/account/verify_credentials.json');
		
		$profile = json_decode($profile,1);
		
		//echo $profile['screen_name'];
		$resultados = $this->TwitterAccounts->findByUsername($profile['screen_name']);
		
		print_r($resultados);
		
		
			//es nuevo
			$data = array();
			$data['TwitterAccounts']['username'] = $profile['screen_name'];
			$data['TwitterAccounts']['profile_pic'] = $profile['profile_image_url'];
			$data['TwitterAccounts']['access_token'] = $accessToken->key;
			$data['TwitterAccounts']['access_token_secret'] = $accessToken->secret;
			
			$this->TwitterAccounts->save($data);
			
		

        $result = $consumer->post($accessKey, $accessSecret, 'http://api.twitter.com/1/statuses/update.json', array('status' => 'hello world!'));
        
        echo '<pre>';
        print_r($result);
        echo '</pre>';
    }


    private function createConsumer() {
        return new OAuth_Consumer('RCTaSO4B3UhaRtDx0my5IA', 'rWHZpRmzrH0Zfe6SEPzkvuKbeAn6hTfYQ2weplC9E');
    }
}
?>