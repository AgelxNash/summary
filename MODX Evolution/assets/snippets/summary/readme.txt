Summary
=========
Truncates the string to the specified length

*Created*: March 14, 2013
*Author*: Agel_Nash <Agel_Nash@xaker.ru>
*License*: GNU GPL

Usage
------
[[summary? &text=`[*content*]`]]
Delete all html tags from [[*content]] tag

[[*content:summary=`len=300&tags=1`]]
Shorten the text up to 100 characters +/- 50 floating and save html tags

[[+content:summary=`len=50&noparser=0`]]
Shorten the text up to 100 characters +/- 50 floating and delete all html tags and convert special characters to HTML and MODX entities

[[summary? &text=`[+content+]` &len=`100`]]
Shorten the text up to 100 characters +/- 10 floating and delete all html tags

*Russian Documentation*: wiki http://wiki.modx.im/evolution:snippets:truncate
*GitHub*: https://github.com/AgelxNash/summary

Note
-------
if <cut /> in text, then you give text before this tag


*I'm sorry for my english and thanks for using summary!

Borisov Evgeniy aka Agel_Nash
Agel_Nash@xaker.ru