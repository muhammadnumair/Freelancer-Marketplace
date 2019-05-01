<?php 
   $uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
   $uri_segments = explode('/', $uri_path);
   $currentPage = $uri_segments[2];
?>
<div class="pro-nav text-center">
   <ul class="nav pro-nav-tabs nav-tabs-dashed">
      <li <?php if($currentPage == 'workroom'){echo 'class="active"'; } ?>><a href='workroom?job=<?php echo $job_id;?>'>Overview & Discussions</a></li>
      <li <?php if($currentPage == 'milestone'){echo 'class="active"'; } ?>><a href="milestone?job=<?php echo $job_id;?>">Milestones</a></li>
      <li <?php if($currentPage == 'task'){echo 'class="active"'; } ?>><a href="task?job=<?php echo $job_id;?>">Tasks</a></li>
      <li <?php if($currentPage == 'file'){echo 'class="active"'; } ?>><a href="file?job=<?php echo $job_id;?>">Files</a></li>
      <li <?php if($currentPage == 'link'){echo 'class="active"'; } ?>><a href="link?job=<?php echo $job_id;?>">Links</a></li>
      <li <?php if($currentPage == 'bug'){echo 'class="active"'; } ?>><a href="bug?job=<?php echo $job_id;?>">Bugs</a></li>
      <li <?php if($currentPage == 'payment'){echo 'class="active"'; } ?>><a href="payment?job=<?php echo $job_id;?>">Payments</a></li>
      <li <?php if($currentPage == 'rate'){echo 'class="active"'; } ?>><a href="rate?job=<?php echo $job_id;?>">Rate the Freelancer</a></li>
   </ul>
</div>