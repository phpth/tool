# tool
php classdoc create tool
> use 
- code
```php
namespace test;

use phpth\tool\classDoc;

use \Exception;


include_once 'classDoc.php';
$doc = new classDoc();

//notice : php version should be than 7.0

try{
    //mysqli doc
    echo $doc->createDoc ( '\mysqli');

    //CURLFile
    echo $doc->createDoc ( '\CURLFile');
}
catch (Exception $e)
{

    echo "Exception: {$e->getMessage ()}";
}

```
> out
```sh
#mysqli
/**
 * Class mysqli
 * @package mysqli
 * @property mixed $affected_rows
 * @property mixed $client_info
 * @property mixed $client_version
 * @property mixed $connect_errno
 * @property mixed $connect_error
 * @property mixed $errno
 * @property mixed $error
 * @property mixed $error_list
 * @property mixed $field_count
 * @property mixed $host_info
 * @property mixed $info
 * @property mixed $insert_id
 * @property mixed $server_info
 * @property mixed $server_version
 * @property mixed $stat
 * @property mixed $sqlstate
 * @property mixed $protocol_version
 * @property mixed $thread_id
 * @property mixed $warning_count
 * @method null autocommit(mixed $mode) 
 * @method null begin_transaction(mixed $flags,mixed $name) 
 * @method null change_user(mixed $user,mixed $password,mixed $database) 
 * @method null character_set_name() 
 * @method null close() 
 * @method null commit(mixed $flags,mixed $name) 
 * @method null connect(mixed $host,mixed $user,mixed $password,mixed $database,mixed $port,mixed $socket) 
 * @method null dump_debug_info() 
 * @method null debug(mixed $debug_options) 
 * @method null get_charset() 
 * @method null get_client_info() 
 * @method null get_connection_stats() 
 * @method null get_server_info() 
 * @method null get_warnings() 
 * @method null init() 
 * @method null kill(mixed $connection_id) 
 * @method null multi_query(mixed $query) 
 * @method null __construct(mixed $host,mixed $user,mixed $password,mixed $database,mixed $port,mixed $socket) 
 * @method null more_results() 
 * @method null next_result() 
 * @method null options(mixed $option,mixed $value) 
 * @method null ping() 
 * @method null poll(array $read,array $write,array $error,mixed $sec,mixed $usec) 
 * @method null prepare(mixed $query) 
 * @method null query(mixed $query,mixed $resultmode) 
 * @method null real_connect(mixed $host,mixed $user,mixed $password,mixed $database,mixed $port,mixed $socket,mixed $flags) 
 * @method null real_escape_string(mixed $string_to_escape) 
 * @method null reap_async_query() 
 * @method null escape_string(mixed $string_to_escape) 
 * @method null real_query(mixed $query) 
 * @method null release_savepoint(mixed $name) 
 * @method null rollback(mixed $flags,mixed $name) 
 * @method null savepoint(mixed $name) 
 * @method null select_db(mixed $database) 
 * @method null set_charset(mixed $charset) 
 * @method null set_opt(mixed $option,mixed $value) 
 * @method null ssl_set(mixed $key,mixed $cert,mixed $certificate_authority,mixed $certificate_authority_path,mixed $cipher) 
 * @method null stat() 
 * @method null stmt_init() 
 * @method null store_result(mixed $flags) 
 * @method null thread_safe() 
 * @method null use_result() 
 * @method null refresh(mixed $options) 
 */
 
 
 #curlfile
/**
 * Class CURLFile
 * @package CURLFile
 * @property mixed $name
 * @property mixed $mime
 * @property mixed $postname
 * @method null __construct(mixed $filename,mixed $mimetype,mixed $postname) 
 * @method null getFilename() 
 * @method null getMimeType() 
 * @method null setMimeType(mixed $name) 
 * @method null getPostFilename() 
 * @method null setPostFilename(mixed $name) 
 * @method null __wakeup() 
 */

```
