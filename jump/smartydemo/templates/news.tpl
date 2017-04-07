{#* if演示=======  *#}

{#if $name eq "tom" #}
  <h1>hello Tom !!</h1>
{#elseif $name == 'sam' #}
  <h1>oh Sam !!</h1>
{#else #}
  <h1>who are you ?</h1>
{#/if #}
<hr>

{#* foreach演示======  *#}

{#foreach from=$newsArray item=news #}
  <p>{#$news.id #} : {#$news.content#}</p>
{#foreachelse #}
  <p>今日没有新闻</p>
{#/foreach#}
<hr>

{#* section演示======  *#}

{#section name=loop start=0 loop=$newsArray show=false#}
  <p>{#$newsArray[loop].id #} : {#$newsArray[loop].content#}</p>
{#/section#}
