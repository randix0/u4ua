<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="{$source.url}" id="shareForm">
    {foreach from=$source.params key=key item=item}
        <input type="hidden" name="{$key}" value="{$item}"  />
    {/foreach}
</form>

<script type="text/javascript">document.getElementById("shareForm").submit()</script>
</body>
</html>