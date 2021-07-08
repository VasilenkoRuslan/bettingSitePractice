
<?php

class ThemeHome
{

	function get_header_board()
	{
		if (empty($board_item = get_field('header_board'))) {
			return "";
		}

		$title = $board_item['title_left'];
		$subtitle = $board_item['subtitle_left'];
		$text = $board_item['text_right'];

		$board = <<<HTML
<div id="headerwrap">
	<div class="container header_board">
		<div class="row centered">
			<div class="col-lg-5">
				<h1><span>{$title}</span><br>
				{$subtitle}</h1>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-6">
				<p>{$text}</p>
			</div>
		</div>
	</div>
</div>
HTML;
		return $board;
	}
}
