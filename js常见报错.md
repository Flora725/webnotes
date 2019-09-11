### 语法错误
- `Uncaught SyntaxError: Invalid shorthand property initializer` 未捕获的语法错误：简写的属性初始化不合法
- `Uncaught SyntaxError: Invalid or unexpected token` 未捕获的语法错误：不合法的或未和的标记（通常是标点符号、括号错误）

### 类型错误
- `Uncaught TypeError: Assignment to constant variable` 未捕获的类型错误：指派常数为变量（通常是把常量又赋了值）
- `Uncaught TypeError: Cannot read property "..." of undefined` 未捕获的类型错误：不能给 undefined 设置...属性（通常是元素没有取到）
### 引用错误
- `Uncaught ReferenceError: f is not defined` 未捕获的引用错误：f 未定义（通常是使用了没有声明的变量）
### 其他错误
- `Failed to load resource: net::ERR_FAILED` 加载资源失败：网络错误
- `Uncaught DOMException: Blocked a frame with origin "null" from accessing a cross-origin frame.` 跨页面操作涉及域（origin），阻止了一个域为 null 的 frame 页面访问另一个域为 null 的页面。代码运行时在本地直接用浏览器打开的，地址栏是file:///的页面，只需改为localhost访问就行。

