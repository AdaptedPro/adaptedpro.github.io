<?php
/*
 * ALL SUB PAGES ARE CONTAINED WITHIN A CATEGORY
 * ------------------------------------------------------------------------->
 * This area is written out because there is currently no databse connection
 * to store this data.
 * ------------------------------------------------------------------------->
 */
$categoryPages['Alumni']	= array(
									'Overview'
									, 'Mentoring Program'
									, 'Center Resources'
									, 'Networking'
									, 'Volunteering'
									, 'Scholarship Program'
									, 'Join/Renew');
		
$categoryPages['Students']	= array(
									'Overview'
									, 'Student Alumni Association'
									, 'Career Resources'
									, 'Networking'
									, 'Mentoring Program'
									, 'Scholarship Program');
		
$categoryPages['Advocacy']	= array(
									'Overview'
									, 'Volunteering'
									, 'E-Advocacy Action Center'
									, 'Budget Information'
									, 'Parent Advocates'
									, 'Resources'
									);
						
$categoryPages['Events']	= array(
									'Calendar'
									, 'Alumni Awards Gala'
									, 'Grad Fair'
									);
		
$categoryPages['Benefits']	= array(
									'Overview'
									, 'Discounts'
									, 'Cal State L.A. TODAY'
									, 'Elumni Newsletter'
									, 'More Benefits'
									);
		
$categoryPages['Meet Us']	= array(
									'Overview'
									, 'Staff'
									, 'Board of Directors'
									);

$top_nav = build_top_nav($categoryPages);
$sub_nav_header = build_sub_nav($categoryPages, true,false);
$sub_nav_pages = build_sub_nav($categoryPages, false,true);