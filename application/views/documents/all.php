<?php echo get_instance()->header(); ?>
<div class="container">
<div class="row">
                        <div class="col-sm-12">
                            <!-- start: PAGE TITLE & BREADCRUMB -->
                            <ol class="breadcrumb">
                                <li>
                                    <i class="clip-home-3"></i>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li class="active">
                                    Documents
                                </li>
                                <li class="search-box">
                                    <form class="sidebar-search">
                                        <div class="form-group">
                                            <input type="text" placeholder="Start Searching..." data-default="130">
                                            <button class="submit">
                                                <i class="clip-search-3"></i>
                                            </button>
                                        </div>
                                    </form>
                                </li>
                            </ol>
                            <div class="page-header">
                                <h1>Documents <small>projects &amp; homeworks </small></h1>
                            </div>
                            <!-- end: PAGE TITLE & BREADCRUMB -->
                        </div>
                    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- start: TABLE WITH IMAGES PANEL -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="icon-external-link-sign"></i>
                    Documents
                    <div class="panel-tools">
                        <a class="btn btn-xs btn-link panel-collapse collapses" href="#">
                        </a>
                       
                        <a class="btn btn-xs btn-link panel-refresh" href="#">
                            <i class="icon-refresh"></i>
                        </a>
                        <a class="btn btn-xs btn-link panel-expand" href="#">
                            <i class="icon-resize-full"></i>
                        </a>
                        
                    </div>
                </div>
                <div class="panel-body">
                <div class="alert alert-warning">
                                        <i class="icon-exclamation-sign"></i>
                                        <strong>Don't worry!</strong> This page is connecting facebook to fetch documents. So, it may load slowly.
                                    </div>
                    <table class="table table-condensed table-hover" id="sample-table-2">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>File Name</th>
                                <th class="hidden-xs">Uploader</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($files as $file): 
                                
                                    $file_segments = explode('/',$file['download_link']);
                                    $file_name = urldecode(end($file_segments));
                                    $name_segments = explode('.',$file_name);
                                    $ext = end($name_segments);
                                ?>
                                <tr>
                                    <td class="center"><img src="<?php echo file_icon_url($ext); ?>" alt="image"/></td>
                                    <td><a href="<?php echo $file['download_link']; ?>"><?php echo $file_name; ?></a><br />
                                        <span style="font-size:10px"><?php echo  substr(isset($file['message']) ?  $file['message'] : '',0,100)?></span>
                                    </td>
                                    <td class="hidden-xs"><img src="<?php echo  fb_profile_pic_url($file['from']['id']);?>" width="30" class="circle-img"/>&nbsp;<?php echo $file['from']['name']?></td>
                                    <td class="center">
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">
                                            <a href="https://www.facebook.com/download/preview/<?php echo $file['id'] ?>" class="btn btn-teal tooltips" data-placement="top" data-original-title="View"><i class="icon-search"></i></a>
                                            <a href="<?php echo $file['download_link']; ?>" class="btn btn-green tooltips" data-placement="top" data-original-title="Download"><i class="icon-download"></i></a>
                      
                                        </div>
                                       </td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end: TABLE WITH IMAGES PANEL -->
        </div>
    </div>
</div> 
<?php echo get_instance()->footer(); ?>