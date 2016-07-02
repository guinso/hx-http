# hx-http
PHP Http input and output handler

## Install
* __Composer__
```json
    {
        "require": {
            "guinso/hx-http": "1.0.*"
        }
    }
```

* __Manual__
```php
    require_once('path-of-hx-http-library/src/autoloader.php');
```

## Example
* __Read Http Input__
```php
$httpHeader = new \Hx\Http\HeaderReader();
$httpInputService = new \Hx\Http\InputService();
$arrInfo = $httpInputService.getInput($httpHeader);

//to read general input (no matter GET, POST, or PUT)
$yourClientDataValue = $arrInfo['data']['your-client-specified-data-key'];

//to read client uploaded file path (work for multipart format as well)
$clientUploadTemporaryFilePath = $arrInfo['file']['your-client-specified-file-name'];
```
* __Write Http Output__
    * JSON or XML
    ```php
    $outputService = new \Hx\Http\OutputService();
    $outputData = array(
      'key-A' => 123,
      'key-B' => 'Cat meow',
      'key-C' => [
        'sub-key-1' => 157.67,
        'sub-key-2' => "tree"
      ]
    );
    
    //generate JSON output to http
    $outputService->generateOutput('json', $outputData);
    //OR generate in XML format
    $outputService->generateOutput('xml', $outputData);
    ```
    * Html
    ```php
    $outputService = new \Hx\Http\OutputService();
    $htmlOutput = array(
      'header' =>  //this is html header tag
        "<title>Page Title</title>
        <link rel="stylesheet" href="mystyle.css">",
      'body' => //this is html body tag
       "<body>
        ...
       </body>"
    );
    
    //generate Html output format
    $outputService->generateOutput('html', $htmlOutput);
    ```
    * Download file to client
    ```php
    $outputService = new \Hx\Http\OutputService();
    
    $fileInfo = array(
      'fileName' => 'filename-which-you-want-show-to-client',
      'filePath' => 'actual-physical-file-path'
    );
    
    //download file to client
    $outputService->generateOutput('file', $fileInfo);
    ```
    * Plain text format
    ```php
    $outputService = new \Hx\Http\OutputService();
    
    $data = array("data" => "anything....");
    
    //generate plain text to client
    //NOTE: output is not in Html format since it is marked as 'text/plain' MIME type
    $outputService->generateOutput('text', $data);
    ```
    
