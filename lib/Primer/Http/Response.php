<?php
/**
 * Created by PhpStorm.
 * User: exonintrendo
 * Date: 9/16/14
 * Time: 6:53 PM
 */

namespace Primer\Http;

use Primer\Core\Object;

class Response extends Object
{
    protected $_statusCodes = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Large',
        415 => 'Unsupported Media Type',
        416 => 'Requested range not satisfiable',
        417 => 'Expectation Failed',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'Unsupported Version',
    );

    protected $_mimeTypes = array(
        'html'         => array(
            'text/html',
            '*/*',
        ),
        'json'         => 'application/json',
        'xml'          => array(
            'application/xml',
            'text/xml',
        ),
        'rss'          => 'application/rss+xml',
        'ai'           => 'application/postscript',
        'bcpio'        => 'application/x-bcpio',
        'bin'          => 'application/octet-stream',
        'ccad'         => 'application/clariscad',
        'cdf'          => 'application/x-netcdf',
        'class'        => 'application/octet-stream',
        'cpio'         => 'application/x-cpio',
        'cpt'          => 'application/mac-compactpro',
        'csh'          => 'application/x-csh',
        'csv'          => array(
            'text/csv',
            'application/vnd.ms-excel',
            'text/plain',
        ),
        'dcr'          => 'application/x-director',
        'dir'          => 'application/x-director',
        'dms'          => 'application/octet-stream',
        'doc'          => 'application/msword',
        'docx'         => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'drw'          => 'application/drafting',
        'dvi'          => 'application/x-dvi',
        'dwg'          => 'application/acad',
        'dxf'          => 'application/dxf',
        'dxr'          => 'application/x-director',
        'eot'          => 'application/vnd.ms-fontobject',
        'eps'          => 'application/postscript',
        'exe'          => 'application/octet-stream',
        'ez'           => 'application/andrew-inset',
        'flv'          => 'video/x-flv',
        'gtar'         => 'application/x-gtar',
        'gz'           => 'application/x-gzip',
        'bz2'          => 'application/x-bzip',
        '7z'           => 'application/x-7z-compressed',
        'hdf'          => 'application/x-hdf',
        'hqx'          => 'application/mac-binhex40',
        'ico'          => 'image/x-icon',
        'ips'          => 'application/x-ipscript',
        'ipx'          => 'application/x-ipix',
        'js'           => 'application/javascript',
        'latex'        => 'application/x-latex',
        'lha'          => 'application/octet-stream',
        'lsp'          => 'application/x-lisp',
        'lzh'          => 'application/octet-stream',
        'man'          => 'application/x-troff-man',
        'me'           => 'application/x-troff-me',
        'mif'          => 'application/vnd.mif',
        'ms'           => 'application/x-troff-ms',
        'nc'           => 'application/x-netcdf',
        'oda'          => 'application/oda',
        'otf'          => 'font/otf',
        'pdf'          => 'application/pdf',
        'pgn'          => 'application/x-chess-pgn',
        'pot'          => 'application/vnd.ms-powerpoint',
        'pps'          => 'application/vnd.ms-powerpoint',
        'ppt'          => 'application/vnd.ms-powerpoint',
        'pptx'         => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'ppz'          => 'application/vnd.ms-powerpoint',
        'pre'          => 'application/x-freelance',
        'prt'          => 'application/pro_eng',
        'ps'           => 'application/postscript',
        'roff'         => 'application/x-troff',
        'scm'          => 'application/x-lotusscreencam',
        'set'          => 'application/set',
        'sh'           => 'application/x-sh',
        'shar'         => 'application/x-shar',
        'sit'          => 'application/x-stuffit',
        'skd'          => 'application/x-koan',
        'skm'          => 'application/x-koan',
        'skp'          => 'application/x-koan',
        'skt'          => 'application/x-koan',
        'smi'          => 'application/smil',
        'smil'         => 'application/smil',
        'sol'          => 'application/solids',
        'spl'          => 'application/x-futuresplash',
        'src'          => 'application/x-wais-source',
        'step'         => 'application/STEP',
        'stl'          => 'application/SLA',
        'stp'          => 'application/STEP',
        'sv4cpio'      => 'application/x-sv4cpio',
        'sv4crc'       => 'application/x-sv4crc',
        'svg'          => 'image/svg+xml',
        'svgz'         => 'image/svg+xml',
        'swf'          => 'application/x-shockwave-flash',
        't'            => 'application/x-troff',
        'tar'          => 'application/x-tar',
        'tcl'          => 'application/x-tcl',
        'tex'          => 'application/x-tex',
        'texi'         => 'application/x-texinfo',
        'texinfo'      => 'application/x-texinfo',
        'tr'           => 'application/x-troff',
        'tsp'          => 'application/dsptype',
        'ttc'          => 'font/ttf',
        'ttf'          => 'font/ttf',
        'unv'          => 'application/i-deas',
        'ustar'        => 'application/x-ustar',
        'vcd'          => 'application/x-cdlink',
        'vda'          => 'application/vda',
        'xlc'          => 'application/vnd.ms-excel',
        'xll'          => 'application/vnd.ms-excel',
        'xlm'          => 'application/vnd.ms-excel',
        'xls'          => 'application/vnd.ms-excel',
        'xlsx'         => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xlw'          => 'application/vnd.ms-excel',
        'zip'          => 'application/zip',
        'aif'          => 'audio/x-aiff',
        'aifc'         => 'audio/x-aiff',
        'aiff'         => 'audio/x-aiff',
        'au'           => 'audio/basic',
        'kar'          => 'audio/midi',
        'mid'          => 'audio/midi',
        'midi'         => 'audio/midi',
        'mp2'          => 'audio/mpeg',
        'mp3'          => 'audio/mpeg',
        'mpga'         => 'audio/mpeg',
        'ogg'          => 'audio/ogg',
        'oga'          => 'audio/ogg',
        'spx'          => 'audio/ogg',
        'ra'           => 'audio/x-realaudio',
        'ram'          => 'audio/x-pn-realaudio',
        'rm'           => 'audio/x-pn-realaudio',
        'rpm'          => 'audio/x-pn-realaudio-plugin',
        'snd'          => 'audio/basic',
        'tsi'          => 'audio/TSP-audio',
        'wav'          => 'audio/x-wav',
        'aac'          => 'audio/aac',
        'asc'          => 'text/plain',
        'c'            => 'text/plain',
        'cc'           => 'text/plain',
        'css'          => 'text/css',
        'etx'          => 'text/x-setext',
        'f'            => 'text/plain',
        'f90'          => 'text/plain',
        'h'            => 'text/plain',
        'hh'           => 'text/plain',
        'htm'          => array(
            'text/html',
            '*/*',
        ),
        'ics'          => 'text/calendar',
        'm'            => 'text/plain',
        'rtf'          => 'text/rtf',
        'rtx'          => 'text/richtext',
        'sgm'          => 'text/sgml',
        'sgml'         => 'text/sgml',
        'tsv'          => 'text/tab-separated-values',
        'tpl'          => 'text/template',
        'txt'          => 'text/plain',
        'text'         => 'text/plain',
        'avi'          => 'video/x-msvideo',
        'fli'          => 'video/x-fli',
        'mov'          => 'video/quicktime',
        'movie'        => 'video/x-sgi-movie',
        'mpe'          => 'video/mpeg',
        'mpeg'         => 'video/mpeg',
        'mpg'          => 'video/mpeg',
        'qt'           => 'video/quicktime',
        'viv'          => 'video/vnd.vivo',
        'vivo'         => 'video/vnd.vivo',
        'ogv'          => 'video/ogg',
        'webm'         => 'video/webm',
        'mp4'          => 'video/mp4',
        'm4v'          => 'video/mp4',
        'f4v'          => 'video/mp4',
        'f4p'          => 'video/mp4',
        'm4a'          => 'audio/mp4',
        'f4a'          => 'audio/mp4',
        'f4b'          => 'audio/mp4',
        'gif'          => 'image/gif',
        'ief'          => 'image/ief',
        'jpg'          => 'image/jpeg',
        'jpeg'         => 'image/jpeg',
        'jpe'          => 'image/jpeg',
        'pbm'          => 'image/x-portable-bitmap',
        'pgm'          => 'image/x-portable-graymap',
        'png'          => 'image/png',
        'pnm'          => 'image/x-portable-anymap',
        'ppm'          => 'image/x-portable-pixmap',
        'ras'          => 'image/cmu-raster',
        'rgb'          => 'image/x-rgb',
        'tif'          => 'image/tiff',
        'tiff'         => 'image/tiff',
        'xbm'          => 'image/x-xbitmap',
        'xpm'          => 'image/x-xpixmap',
        'xwd'          => 'image/x-xwindowdump',
        'ice'          => 'x-conference/x-cooltalk',
        'iges'         => 'model/iges',
        'igs'          => 'model/iges',
        'mesh'         => 'model/mesh',
        'msh'          => 'model/mesh',
        'silo'         => 'model/mesh',
        'vrml'         => 'model/vrml',
        'wrl'          => 'model/vrml',
        'mime'         => 'www/mime',
        'pdb'          => 'chemical/x-pdb',
        'xyz'          => 'chemical/x-pdb',
        'javascript'   => 'application/javascript',
        'form'         => 'application/x-www-form-urlencoded',
        'file'         => 'multipart/form-data',
        'xhtml'        => array(
            'application/xhtml+xml',
            'application/xhtml',
            'text/xhtml',
        ),
        'xhtml-mobile' => 'application/vnd.wap.xhtml+xml',
        'atom'         => 'application/atom+xml',
        'amf'          => 'application/x-amf',
        'wap'          => array(
            'text/vnd.wap.wml',
            'text/vnd.wap.wmlscript',
            'image/vnd.wap.wbmp',
        ),
        'wml'          => 'text/vnd.wap.wml',
        'wmlscript'    => 'text/vnd.wap.wmlscript',
        'wbmp'         => 'image/vnd.wap.wbmp',
        'woff'         => 'application/x-font-woff',
        'webp'         => 'image/webp',
        'appcache'     => 'text/cache-manifest',
        'manifest'     => 'text/cache-manifest',
        'htc'          => 'text/x-component',
        'rdf'          => 'application/xml',
        'crx'          => 'application/x-chrome-extension',
        'oex'          => 'application/x-opera-extension',
        'xpi'          => 'application/x-xpinstall',
        'safariextz'   => 'application/octet-stream',
        'webapp'       => 'application/x-web-app-manifest+json',
        'vcf'          => 'text/x-vcard',
        'vtt'          => 'text/vtt',
        'mkv'          => 'video/x-matroska',
        'pkpass'       => 'application/vnd.apple.pkpass',
    );

    /**
     * HTTP version to send to the client
     *
     * @var string
     */
    protected $_version = '1.0';

    /**
     * Status code to send to the client
     *
     * @var int
     */
    protected $_status = 200;

    /**
     * Content type to send. This can be an 'extension' that will be transformed using the $_mimetypes array
     * or a complete mime-type
     *
     * @var int
     */
    protected $_contentType = 'text/html';

    /**
     * Buffer list of headers
     *
     * @var array
     */
    protected $_headers;

    /**
     * Buffer string for response message
     *
     * @var string
     */
    protected $_content = null;

    /**
     * The charset the response body is encoded with
     *
     * @var string
     */
    protected $_charset = 'UTF-8';

    /**
     * Holds all the cache directives that will be converted
     * into headers when sending the request
     *
     * @var string
     */
    protected $_cacheDirectives = array();

    /**
     * Constructor
     *
     * @param array $options list of parameters to setup the response. Possible values are:
     *    - body: the response text that should be sent to the client
     *    - statusCodes: additional allowable response codes
     *    - status: the HTTP status code to respond with
     *    - type: a complete mime-type string or an extension mapped in this class
     *    - charset: the charset for the response body
     */
    public function __construct($content = '', $status = 200, $headers = array())
    {
        $this->set($content, $status, $headers);
    }

    public function set($content = '', $status = 200, $headers = array())
    {
        $this->setContent($content);
        $this->_status = $status;
        $this->_headers = new HeaderBag($headers);

        return $this;
    }

    public function setStatusCode($code)
    {
        $this->_status = $code;
    }

    public function getStatusCode()
    {
        return $this->_status;
    }

    public function setContent($content)
    {
        if (!is_string($content)) {
            throw new \ErrorException('Body for response content must be a string or implement __toString() function');
        }

        $this->_content = (string)$content;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    public function setCookie(Cookie $cookie)
    {
        $this->_headers->setCookie($cookie);
    }

    private function sendHeaders()
    {
        if (headers_sent()) {
            return false;
        }

        header(sprintf('HTTP/%s %s %s', $this->_version, $this->_status, $this->_statusCodes[$this->_status]), true, $this->_status);

        // cookies
        foreach ($this->_headers->getCookies() as $cookie) {
            /* @var $cookie Cookie */
            setcookie($cookie->getName(), $cookie->getValue(), $cookie->getExpire(), $cookie->getPath(), $cookie->getDomain(), $cookie->isSecure(), $cookie->isHttpOnly());
        }

        foreach ($this->_headers as $name => $value) {
            header("$name: $value", false, $this->_status);
        }

        return true;
    }

    private function sendContent()
    {
        echo $this->_content;

        return true;
    }

    /**
     * Control browser redirects
     *
     * @param $location
     */
    public function redirect($location)
    {
        if ($location === 'referrer') {
            $location = isset($_SERVER['HTTP_REFERRER']) ? $_SERVER['HTTP_REFERRER'] : '/';
        }

        $this->_status = 307;
        $this->_headers['Location'] = $location;

        $this->sendHeaders();
        exit(1);
    }

    public function getStatusCodeText($code)
    {
        if (isset($this->_statusCodes[$code])) {
            return $this->_statusCodes[$code];
        }

        return null;
    }
}