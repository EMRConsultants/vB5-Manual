---
title: XML Sitemap
slug: xml_sitemap
taxonomy:
    category:
        - settings
    tag:
        - options
        - sitemap
visible: false
template: article
version: 5.3.3
date: 12/06/2017 11:16pm
---

## Enable Automatic Sitemap Generation
If you select yes for this option, the XML sitemap will be automatically generated periodically by a scheduled task.<br />
<br />
Even if you select no, you can still <a href="admincp/sitemap.php?do=buildsitemap">manually generate the sitemap</a>.


If automatic sitemap generation is enabled, this option controls the number of days between automatic builds.


The default priority for content in the XML Sitemap. This may be configured on a per-content basis in the <a href="admincp/sitemap.php">XML Sitemap group</a>.<br />
<br />
Only a limited amount of content should be listed in the sitemap as a high priority, so you shouldn't set this value too high.


Select the search engines that you wish to notify when a new sitemap has been generated (manually or via a scheduled task).


XML sitemap data must be written to the filesystem to function. Enter the full path to the directory the files should be written to. Do not include a trailing slash.<br />
<br />
This directory must be writable by the webserver.


Enter the number of URLs that will be processed per page (and placed in each sitemap file). Note that only one type of content will be written to a file, so it is possible that there will be files that have less URLs than the number specified here.<br />
<br />
Enter a value no larger than 50,000. Larger values may cause more performance impact while the sitemap is being generated.


