<?php

/**
 * Takes a page object and writes a cached (static html) version for reading
 * in production.
 *
 * @author Mike Hart
 * @version 0.1
 * @copyright (c) 2012, Mike Hart
 *
 * @package CmsBundle
 * @subpackage Page
 */

namespace Mh\CmsBundle\Classes\Page;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOException;
use Mh\CmsBundle\Entity\Page;

class Cacher
{
    /**
     * Holds a page instance.
     *
     * @var Page
     */
    private $page;

    /**
     * Holds the file system handler.
     *
     * @var Filesystem
     */
    private $fs;

    public function __construct(Page $page)
    {
        $this->page = $page;
        $this->fs = new Filesystem;
    }

    /**
     * Generates a logical file path based on the page and it's owning website.
     *
     * @return string
     */
    public function generateFilePath()
    {
        $path = __DIR__ . "/../../Resources/views/Page/published";
        $path .= "/";
        $path .= str_replace(" ", "_", strtolower($this->page->getWebsite()->getWebsiteName()));

        return $path;
    }

    public function generateFileName()
    {
        return str_replace(" ", "_", strtolower($this->page->getPageName())) . ".html.twig";
    }

    public function doCache()
    {
        // Get the file path.
        $path = $this->generateFilePath();

        // Check that it exists. If it does not, then create it.
        if (!$this->fs->exists($path)) {
            $this->fs->mkdir($path);
        }

        // Get the contents of the page from the stage and store as string.
        $content = $this->fetchContent();

        // Create a new file in the above file path.
        $fh = fopen($path . "/" . $this->generateFileName(), "w");

        // Open the file and write the above string.
        fwrite($fh, $content);

        // Save and close the file.
        fclose($fh);
    }

    public function fetchContent()
    {
        $url = "http://site_builder/cms/pages/" . $this->page->getId() . "/stage";
        $ch = curl_init();
        $timeout = 5;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
