			</div><!-- end #main_content -->
			<?php if ($is_home == true || $pageLevel == 'thirdLevel') {?>			
			<div id="sub_content">
				<div id="sub_left" class="left">
					<ul id="logo_links">
						<li><a href="" target="_blank"><img src="images/sc_store.gif" alt="Store" class="noborder" /></a></li>
						<li><a href="http://www.facebook.com/pages/Los-Angeles-CA/CSULA-Alumni-Association/90515907119" target="_blank"><img src="images/sc_fb_logo.gif" alt="Store" class="noborder" /></a></li>
						<li><a href="http://www.linkedin.com/groups/CSULA-Alumni-Association-43513/about" target="_blank"><img src="images/sc_linkIn_logo.gif" alt="Store" class="noborder" /></a></li>
					</ul>
				</div>
				<div id="sub_right" class="right">
					<?php if ($is_home == true) { ?><img id="sc_alumassoc" src="images/sc_alumassoc.gif" alt="Alumni Association" /><?php } ?>
					<img id="sc_connect" src="images/sc_connect.gif" alt="Connect!" />
				</div>
			</div>
			<?php } else { ?>
			<div id="sub_content" class="<?php echo $pageLevel; ?>">
				<div id="sub_right" class="right">
					<ul id="logo_links">
						<li><a href="http://www.facebook.com/pages/Los-Angeles-CA/CSULA-Alumni-Association/90515907119" target="_blank"><img src="images/sc_fb_logo.gif" alt="Store" class="noborder" /></a></li>
						<li><a href="http://www.linkedin.com/groups/CSULA-Alumni-Association-43513/about" target="_blank"><img src="images/sc_linkIn_logo.gif" alt="Store" class="noborder" /></a></li>
						<li><a href="" target="_blank"><img src="images/sc_store.gif" alt="Store" class="noborder" /></a></li>
					</ul>
				</div>
			</div>				
			<?php } ?>
			<div id="footer">
				<div id="f_nav">
					<table>
						<tr>
							<th><a href="http://www.calstatela.edu">CSULA Home</a></th>
							<?php echo $sub_nav_header; ?>
							<th>Contact Us</th>
						</tr>
						<tr>
							<td>
								<ul>
									<li><a href="https://www.calstatela.edu/philanthropy/annual-giving.php?subjectId=2&amp;pageId=5">Give Now</a></li>
									<li><a href="http://webcam.calstatela.edu/home/homeJ.html">Webcam</a></li>
								</ul>
							</td>
							<?php echo $sub_nav_pages; ?>
							<td>
								<p>We&rsquo;re here to help!</p>
								<p>(323) 343-ALUM (2586)<br /><a href="mailto:alum@cslanet.calstatela.edu">alum@cslanet.calstatela.edu</a></p>
							</td>																								
						</tr>
					</table>				
				</div>
				<p><strong>California State University, Los Angeles Alumni Association</strong> &copy; 
				<a href="http://www.calstatela.edu/copyright.htm"><?php echo date('Y'); ?> 
				Trustees of the California State University</a> | 
				<a href="http://www.calstatela.edu/accessibility/">Accessibility</a> | 
				<a href="http://www.calstatela.edu/copyright.htm">Copyright Information</a> | 
				<a href="">Privacy Policy</a> | <a href="mailto:alum@cslanet.calstatela.edu">Contact</a></p>
			</div>		
		</div>
	</body>
</html>