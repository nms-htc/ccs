<tr class="<?php echo is_sticky() ? 'danger' : ''; ?>">
	<td><?php ccs_entry_title(); ?></td>
	<td><?php the_author_link(); ?></td>
	<td><?php the_date(); ?></td>
	<td><?php the_modified_date(); ?></td>
	<td><?php echo get_the_category_list( ', ' );;  ?></td>
	<td><?php echo get_the_tag_list( '', ',' );  ?></td>
</tr>
	