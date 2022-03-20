<?php  ini_set('upload_max_filesize', '100M');
   ini_set('post_max_size', '100M');
   ini_set('max_input_time', 500);
   ini_set('max_execution_time', 500);?>
<?php error_reporting(0); ?>
<?php include('../header.php');?>


<title>EPS to PNG Free Online Converter | MyFreeOnlineTools</title>
<meta name="description" content="EPS File Converter for EPS to PNG Convert. Free Online Tool Just Upload .eps format file and convert it into a .png file format. MyfreeOnlineTools Free Tools" />


<?php include('../header-remains.php');?>

<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


<div id="otherPageHeader">
    <?php include('../nav.php'); ?>
</div>

<section id="uploadImageSection">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="uploadFileMain">
                    <input type="file" name="uploadFileBase" id="uploadFileBase" class="uploadFileBase" />
                    <label for="">Click or Upload your file of Base64 Convert</label>
                </div>
            </div>
        </div>
    </div>
</section>


    <section id="scrollDownLine">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="scrollDownLine">Scroll down to check other <span>free tools</span></div>
                </div>
            </div>
            <div class="col-md-3">
            <div class="toolsSuggesstion-main">
                        <div class="toolsSuggesstion-heading">HTML Compress</div>
                        <div class="toolsSuggesstion-link"><a href="<?php echo $path?>html-compress-minify/">{Check Now}</a></div>
                    </div>
            </div>
            
               <div class="col-md-3">
            <div class="toolsSuggesstion-main">
                        <div class="toolsSuggesstion-heading">Keyword Density Checker</div>
                        <div class="toolsSuggesstion-link"><a href="<?php echo $path?>word-character-count/">{Check Now}</a></div>
                    </div>
            </div>
            
               <div class="col-md-3">
            <div class="toolsSuggesstion-main">
                        <div class="toolsSuggesstion-heading">Web Font Convertor</div>
                        <div class="toolsSuggesstion-link"><a href="<?php echo $path?>webp-convert/">{Check Now}</a></div>
                    </div>
            </div>
            
               <div class="col-md-3">
            <div class="toolsSuggesstion-main checkOutListTools">
                        <div class="toolsSuggesstion-heading"><b>Check out more free tools list</b></div>
                        <div class="toolsSuggesstion-link"><a href="<?php echo $path?>all-free-online-tools/">{Check Now}</a></div>
                    </div>
            </div>
        </div>
    </section>


<section id="sectionOneAbout">
    <div class="container">
        <div class="row">
           
            <div class="col-md-12">

                <div class="sectionBox">
                    <div class="sectionAboutHeading">Online Convert EPS to PNG Format</div>

                    <div class="sectionQuestionHeading">EPS and PNG File Format</div>
                    <div class="sectionQuestionAns">
                        <p>This online free conversion tool converts your eps format file to png file format with an easy step. The EPS file is vector file format and the operating system does not support the eps file so that we created an online conversion tool for convert EPS to PNG file format. PNG file format developed as an alternative solution of GIF, which had a commercial license. The best feature of PNG file format its predecessor, losses, compress and also transparent background support.</p>
                    </div>
                </div>
            </div>
        </div>
        
               <div class="row">
                    <div class="col-md-12">
                        <div class="sectionBox">
                            <div class="sectionQuestionHeading">EPS - Encapsulated PostScript </div>
                            <div class="sectionQuestionAns">
                                <p>EPS format storing graphical vector image used in illustrator program and other vector graphics software. EPS file format having a binary or ASCII structure. Its contains raster images, 2D vector graphic, and text. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="sectionBox">
                            <div class="sectionQuestionHeading">PNG - Portable Network Graphic </div>
                            <div class="sectionQuestionAns">
                                <p>PNG file format a raster graphic data storage format, its use for lossless compression algorithm. Its supports raster images, grayscale image, color index images. Png image format store graphical information in compression form.</p>
                                <br />
                            </div>
                        </div>

                    </div>
                </div>

    </div>
</section>




<?php include('../footer.php') ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function uploadEpsFunction() {
        jQuery('#storeFolder').html('<div class="processEpsFile">Image Uploading...</div>');
        var formData = new FormData();
        var epsUpload = jQuery('#epsUpload')[0].files[0];
        formData.append('epsFile', epsUpload);
        $.ajax({
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            url: "upload.php",
            data: formData,
            success: function(data) {
                jQuery('#epsBaseCode').slideDown();
                jQuery('#epsOutputCode').slideDown();
              //  jQuery('#storeFolder').html(data);
                console.log(data);
                
                var getFileExtension = data[1];
                var getEPSBaseCode = data[2];
                var getFileSize = data[3]/1024;
                var baseCode = 'data:'+getFileExtension+';base64,'+getEPSBaseCode;
                
                jQuery('#epsBaseCode').html('<textarea id="baseImageCode">'+baseCode+'</textarea>');
              
                jQuery('#storeFolder').hide();
                console.log(getFileSize.toFixed(2));
                
            }

        });
    }

    (function() {
        jQuery('#epsUpload').change(function() {
            
            uploadEpsFunction();

            var changeFile = jQuery(this).val();

            var changeFileName = changeFile.replace(/^.*[\\\/]/, '');

            console.log(changeFileName);

            jQuery(this).parent().append('<div class="fileNameEPS">' + changeFileName + '</div>');
    
            

        });
    })();
    
    function resetField(){
             window.location.reload();
        }

        function copyClipText(){
             var copyText = document.getElementById("baseImageCode");
          copyText.select();
          document.execCommand("copy");
        }
        

</script>
