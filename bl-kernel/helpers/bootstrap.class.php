<?php

class Bootstrap {

	public static function formInputHidden($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;
		$value = isset($args['value'])?$args['value']:'';

		return '<input type="hidden" id="'.$id.'" name="'.$name.'" value="'.$value.'">';
	}

	// Floating Labels
	// https://getbootstrap.com/docs/5.0/forms/floating-labels/
	public static function formFloatingLabels($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;
		$value = isset($args['value'])?$args['value']:'';

		$type = isset($args['type'])?$args['type']:'text';
		$placeholder = isset($args['placeholder'])?$args['placeholder']:'';
		$label = isset($args['label'])?$args['label']:$placeholder;

		$class = 'form-control';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

return <<<EOF
<div class="form-floating mb-3">
  <input type="$type" class="$class" id="$id" name="$name" value="$value" placeholder="$placeholder">
  <label for="$id">$label</label>
</div>
EOF;
	}

	public static function formSelect($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;

		$class = 'form-select';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

		$html = '<div class="mb-3 row">';
		if (!empty($args['label'])) {
			$html .= '<label for="'.$id.'" class="col-sm-2 col-form-label">'.$args['label'].'</label>';
		}
		$html .= '<div class="col-sm-10">';
		$html .= '<select id="'.$id.'" name="'.$name.'" class="'.$class.'">';
		foreach ($args['options'] as $key=>$value) {
			$html .= '<option '.(($key==$args['selected'])?'selected':'').' value="'.$key.'">'.$value.'</option>';
		}
		$html .= '</select>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	public static function formSelectBlock($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;

		$class = 'form-select';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

		$html = '<div>';
		if (!empty($args['label'])) {
			$html .= '<label for="'.$id.'">'.$args['label'].'</label>';
		}
		$html .= '<select id="'.$id.'" name="'.$name.'" class="'.$class.'">';
		foreach ($args['options'] as $key=>$value) {
			$html .= '<option '.(($key==$args['selected'])?'selected':'').' value="'.$key.'">'.$value.'</option>';
		}
		$html .= '</select>';
		$html .= '</div>';

		return $html;
	}

	public static function formTextarea($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;
		$placeholder = isset($args['placeholder'])?$args['placeholder']:'';
		$value = isset($args['value'])?$args['value']:'';
		$rows = isset($args['rows'])?$args['rows']:'3';

		$tip = '';
		if (!empty($args['tip'])) {
			$tip = '<div class="form-text">'.$args['tip'].'</div>';
		}

		$label = '';
		if (!empty($args['label'])) {
			$label = '<label for="'.$id.'" class="col-sm-2 col-form-label">'.$args['label'].'</label>';
		}

		$class = 'form-control';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

return <<<EOF
<div class="mb-3 row">
	$label
	<div class="col-sm-10">
		<textarea class="$class" id="$id" name="$name" rows="$rows" placeholder="$placeholder" spellcheck="false">$value</textarea>
		$tip
	</div>
</div>
EOF;
	}

	public static function formInputText($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;
		$disabled = empty($args['disabled'])?'':'disabled';
		$readonly = empty($args['readonly'])?'':'readonly';
		$placeholder = isset($args['placeholder'])?$args['placeholder']:'';
		$value = isset($args['value'])?$args['value']:'';
		$type = isset($args['type'])?$args['type']:'text';

		$tip = '';
		if (!empty($args['tip'])) {
			$tip = '<div class="form-text">'.$args['tip'].'</div>';
		}

		$label = '';
		if (!empty($args['label'])) {
			$label = '<label for="'.$id.'" class="col-sm-2 col-form-label">'.$args['label'].'</label>';
		}

		$class = 'form-control';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

return <<<EOF
<div class="mb-3 row">
	$label
	<div class="col-sm-10">
		<input class="$class" id="$id" name="$name" value="$value" placeholder="$placeholder" type="$type" $disabled $readonly>
		$tip
	</div>
</div>
EOF;
	}

	public static function formSelectOld($args)
	{
		$name = $args['name'];
		$id = isset($args['id'])?$args['id']:$name;
		$value = isset($args['value'])?$args['value']:'';

		$class = 'custom-select';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

		$html = '<div class="mb-3 row">';
		if (!empty($args['label'])) {
			$html .= '<label for="'.$id.'" class="col-sm-2 col-form-label">'.$args['label'].'</label>';
		}
		$html .= '<div class="col-sm-10">';
		$html .= '<select id="'.$id.'" name="'.$name.'" class="'.$class.'">';
		foreach ($args['options'] as $key=>$value) {
			$html .= '<option '.(($key==$args['selected'])?'selected':'').' value="'.$key.'">'.$value.'</option>';
		}
		$html .= '</select>';
		if (!empty($args['tip'])) {
			$html .= '<div class="form-text">'.$args['tip'].'</div>';
		}
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	public static function pageTitle($args)
	{
		$icon = $args['icon'];
		$title = $args['title'];
return <<<EOF
<h2 class="m-0">
	<span class="bi bi-$icon"></span><span>$title</span>
</h2>
EOF;
	}


	// -- OLD --------
	public static function modal($args) {

		$buttonSecondary = $args['buttonSecondary'];
		$buttonSecondaryClass = $args['buttonSecondaryClass'];

		$buttonPrimary = $args['buttonPrimary'];
		$buttonPrimaryClass = $args['buttonPrimaryClass'];

		$modalText = $args['modalText'];
		$modalTitle = $args['modalTitle'];
		$modalId = $args['modalId'];


return <<<EOF
<div id="$modalId" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<h3>$modalTitle</h3>
				<p>$modalText</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn $buttonSecondaryClass" data-dismiss="modal">$buttonSecondary</button>
				<button type="button" class="btn $buttonPrimaryClass">$buttonPrimary</button>
			</div>
		</div>
	</div>
</div>
EOF;
	}





	public static function formOpen($args)
	{
		$class = empty($args['class'])?'':'class="'.$args['class'].'"';
		$id = empty($args['id'])?'':'id="'.$args['id'].'"';
		$enctype = empty($args['enctype'])?'':'enctype="'.$args['enctype'].'"';
		$action = empty($args['action'])?'action=""':'action="'.$args['action'].'"';
		$method = empty($args['method'])?'method="post"':'method="'.$args['method'].'"';
		$style = empty($args['style'])?'':'style="'.$args['style'].'"';

return <<<EOF
<form $class $enctype $id $method $action $style autocomplete="off">
EOF;
	}

	public static function formClose()
	{
return <<<EOF
</form>
EOF;
	}

	public static function formTitle($args)
	{
		$title = $args['title'];
return <<<EOF
<h6 class="mt-4 mb-2 pb-2 border-bottom text-uppercase">$title</h6>
EOF;
	}

	public static function formInputTextBlock($args)
	{
		$name = $args['name'];
		$disabled = empty($args['disabled'])?'':'disabled';
		$placeholder = isset($args['placeholder'])?$args['placeholder']:'';
		$value = isset($args['value'])?$args['value']:'';

		$id = 'js'.$name;
		if (isset($args['id'])) {
			$id = $args['id'];
		}

		$tip = '';
		if (!empty($args['tip'])) {
			$tip = '<div class="form-text">'.$args['tip'].'</div>';
		}

		$class = 'mb-3 m-0';
		if (isset($args['class'])) {
			$class = $args['class'];
		}

		$labelClass = 'mt-4 mb-2 pb-2 border-bottom text-uppercase w-100';
		if (isset($args['labelClass'])) {
			$labelClass = $args['labelClass'];
		}

		$label = '';
		if (!empty($args['label'])) {
			$label = '<label class="'.$labelClass.'" for="'.$id.'">'.$args['label'].'</label>';
		}

		$type = 'text';
		if (isset($args['type'])) {
			$type = $args['type'];
		}

return <<<EOF
<div class="$class">
	$label
	<input type="text" value="$value" class="form-control" id="$id" name="$name" placeholder="$placeholder" $disabled>
	$tip
</div>
EOF;
	}

	public static function formInputFile($args)
	{
		$id = 'js'.$args['name'];
		if (isset($args['id'])) {
			$id = $args['id'];
		}

		$class = 'custom-file';
		if (isset($args['class'])) {
			$class = $class.' '.$args['class'];
		}

		$html  = '<div class="'.$class.'">';
		$html .= '<input type="file" class="custom-file-input" id="'.$id.'">';
		$html .= '<label class="custom-file-label" for="'.$id.'">'.$args['label'].'</label>';
		$html .= '</div>';

		return $html;
	}

	public static function formTextareaBlock($args)
	{
		$id = 'js'.$args['name'];
		if (isset($args['id'])) {
			$id = $args['id'];
		}

		$class = 'form-control';
		if (!empty($args['class'])) {
			$class = $class.' '.$args['class'];
		}

		$html = '<div class="mb-3 m-0">';
		if (!empty($args['label'])) {
			$html .= '<h6 class="mt-4 mb-2 pb-2 text-uppercase">'.$args['label'].'</h6>';
		}

		$html .= '<textarea class="'.$class.'" id="'.$id.'" name="'.$args['name'].'" rows="'.$args['rows'].'" placeholder="'.$args['placeholder'].'">'.$args['value'].'</textarea>';
		if (!empty($args['tip'])) {
			$html .= '<div class="form-text">'.$args['tip'].'</div>';
		}
		$html .= '</div>';

		return $html;
	}



	public static function formCheckbox($args)
	{
		$labelForCheckbox = isset($args['labelForCheckbox'])?$args['labelForCheckbox']:'';
		$placeholder = isset($args['placeholder'])?$args['placeholder']:'';
		$tip = isset($args['tip'])?'<div class="form-text">'.$args['tip'].'</div>':'';
		$value = isset($args['value'])?$args['value']:'';
		$name = $args['name'];
		$id = 'js'.$name;
		if (isset($args['id'])) {
			$id = $args['id'];
		}
		$disabled = isset($args['disabled'])?'disabled':'';

		$class = 'mb-3 m-0';
		if (isset($args['class'])) {
			$class = $args['class'];
		}

		$labelClass = 'mt-4 mb-2 pb-2 border-bottom text-uppercase w-100';
		if (isset($args['labelClass'])) {
			$labelClass = $args['labelClass'];
		}

		$type = 'text';
		if (isset($args['type'])) {
			$type = $args['type'];
		}

		$label = '';
		if (!empty($args['label'])) {
			$label = '<label class="'.$labelClass.'">'.$args['label'].'</label>';
		}

		$checked = $args['checked']?'checked':'';
		$value = $checked?'1':'0';

return <<<EOF
<div class="$class">
	$label
	<div class="form-check">
		<input type="hidden" name="$name" value="$value"><input id="$id" type="checkbox" class="form-check-input" onclick="this.previousSibling.value=1-this.previousSibling.value" $checked>
		<label class="form-check-label" for="$id">$labelForCheckbox</label>
		$tip
	</div>
</div>
EOF;
	}






	public static function alert($args)
	{
		$class = 'alert';
		if (!empty($args['class'])) {
			$class = $class.' '.$args['class'];
		}

		$text = $args['text'];

return <<<EOF
<div class="$class" role="alert">$text</div>
EOF;
	}
}
