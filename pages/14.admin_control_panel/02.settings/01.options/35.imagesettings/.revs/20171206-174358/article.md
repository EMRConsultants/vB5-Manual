---
title: Image Settings
slug: image_settings
taxonomy:
    category:
        - settings
    tag:
        - options
        - imagesettings
visible: false
template: article
version: 5.3.3
date: 12/06/2017 11:16pm
---

## Image Processing Library
Choose the image processing library that vBulletin will use for processing thumbnails and avatars.  GD is more widely available but ImageMagick is more robust, supporting more image types. ImageMagick must have a valid path chosen below.


Path to the ImageMagick 6 binaries (<i>convert</i> and <i>identify</i>). Example:<br /><br />
Unix: /usr/local/bin/<br />
Windows: C:\imagemagick\


Using the ImageMagick processing library, you can enable thumbnails for PDF attachments if GhostScript is installed on your server. 
This option only takes effect if using the "ImageMagick 6" for "Image Processing Library" option above.


Uploaded images are automatically recreated by the image handler for security purposes. When using the GD image library, a created JPEG file may result in a larger size than the original image.  This option controls the tradeoff between filre size and image quality, from 0 (worst quality, smallest size) to 100 (best quality, largest size). <br /><br />

The default is suitable for most sites.


