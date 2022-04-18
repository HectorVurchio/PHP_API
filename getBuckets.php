<?php
//https://docs.ceph.com/en/latest/radosgw/s3/php/
use Aws\S3\S3Client;
use Aws\Exception\AwsException;
use Aws\S3\Exception\S3Exception;
require $_SERVER['DOCUMENT_ROOT']."/libraries/aws/vendor/autoload.php";

define('ORACLE_ACCESS_KEY', 'd7bf5934fc6338b99226976950b6ae34560162c4'); //key
define('ORACLE_SECRET_KEY', 'QpxY9ZX7EkIe2RYvcIf2yP9G/aqPY4cg78IRAvsuFE4='); //password
define('ORACLE_REGION', 'us-ashburn-1');
define('ORACLE_NAMESPACE', 'id5rfgklarlr');

listing_owned_buckets();

function get_oracle_client(){
    $endpoint = "https://".ORACLE_NAMESPACE.".compat.objectstorage.".ORACLE_REGION.".oraclecloud.com";

    return new Aws\S3\S3Client(array(
        'credentials' => [
            'key' => ORACLE_ACCESS_KEY,
            'secret' => ORACLE_SECRET_KEY,
        ],
        'version' => 'latest',
        'region' => ORACLE_REGION,
        'bucket_endpoint' => true,
        'endpoint' => $endpoint,
		'http'    => [
						'verify' => 'C:/PHP_8.1.3/extras/ssl/cacert.pem' //http://curl.haxx.se/ca/cacert.pem
					 ]
    ));
}

function listing_owned_buckets(){
	$client = get_oracle_client();
	$listResponse = $client->listBuckets();
	$buckets = $listResponse['Buckets'];
	foreach ($buckets as $bucket) {
		echo $bucket['Name'] . "\t" . $bucket['CreationDate'] . "\n";
	}
}


?>