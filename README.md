重要说明
====

目前仅在**Typecho版本1.2**测试

**仅适用于默认主题和使用默认文本编辑器的主题**

基于泽泽社长的默认主题mdeditor增强插件魔改，即插即用，添加自定义按钮，使默认md编辑器可以实现一键代码块，居中，文字下划线，五种颜色，LateX公式等等操作。

使用方式
=====
下载MdEditorPlus.zip解压到`\Plugin`文件夹内，确保文件夹名称为`MdEditorPlus`。

参考链接
====
[Darylyexu's Blog](https://www.darylyexu.top:8888/)

额外说明
====

原版按钮 js 位置为`admin/js/pagedown.js`
以下是本人对按钮 bar 部分的修改，调整部分按钮位置并删除不常用的编号按钮，可供参考：

在 `pagedown.js` 的第 3295-3315 行
```
            buttons.bold = makeButton("wmd-bold-button", getString("bold"), "0px", bindCommand("doBold"));
            buttons.italic = makeButton("wmd-italic-button", getString("italic"), "-20px", bindCommand("doItalic"));
            makeSpacer(1);
            buttons.code = makeButton("wmd-code-button", getString("code"), "-80px", bindCommand("doCode"));
            buttons.link = makeButton("wmd-link-button", getString("link"), "-40px", bindCommand(function (chunk, postProcessing) {
                return this.doLinkOrImage(chunk, postProcessing, false);
            }));
            buttons.quote = makeButton("wmd-quote-button", getString("quote"), "-60px", bindCommand("doBlockquote"));
            buttons.image = makeButton("wmd-image-button", getString("image"), "-100px", bindCommand(function (chunk, postProcessing) {
                return this.doLinkOrImage(chunk, postProcessing, true);
            }));
            buttons.heading = makeButton("wmd-heading-button", getString("heading"), "-160px", bindCommand("doHeading"));
            buttons.hr = makeButton("wmd-hr-button", getString("hr"), "-180px", bindCommand("doHorizontalRule"));
            buttons.more = makeButton("wmd-more-button", getString("more"), "-280px", bindCommand("doMore"));
            makeSpacer(2);
            makeSpacer(3);
            buttons.undo = makeButton("wmd-undo-button", getString("undo"), "-200px", null);
            buttons.undo.execute = function (manager) { if (manager) manager.undo(); };

            var redoTitle = /win/.test(nav.platform.toLowerCase()) ?
                getString("redo") :
                getString("redomac"); // mac and other non-Windows platforms

            buttons.redo = makeButton("wmd-redo-button", redoTitle, "-220px", null);
            buttons.redo.execute = function (manager) { if (manager) manager.redo(); };
            buttons.fullscreen = makeButton("wmd-fullscreen-button", getString("fullscreen"), "-240px", null);
            buttons.fullscreen.execute = function () { fullScreenManager.doFullScreen(buttons, true); };
            buttons.exitFullscreen = makeButton("wmd-exit-fullscreen-button", getString("exitFullscreen"), "-260px", null);
            buttons.exitFullscreen.style.display = 'none';
            buttons.exitFullscreen.execute = function () { fullScreenManager.doFullScreen(buttons, false); };
```
旧版本以及各家魔改版本class名称可能不同，请灵活变通。
