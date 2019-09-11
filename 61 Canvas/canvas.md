# Canvas
## fillRect() 和 rect() 有什么区别？
&emsp;&emsp;先来看一段代码，猜一猜这两个正方形分别是什么颜色？
```
1 ctx.fillStyle = "red";
2 ctx.rect(50, 50, 50, 50);
3 ctx.fill();
4 ctx.fillStyle = "blue";
5 ctx.rect(120, 50, 50, 50);
6 ctx.fill(); 
```
&emsp;&emsp;出现两个蓝色正方形对吗？如果我把第 2 行和第 3 行合并成 `ctx.fillRect(50, 50, 50, 50)` 或者把第 5 行和第 6 行合并成 `ctx.fillRect(120,50, 50, 50)` 就会出现一个红色和一个蓝色正方形。为什么会出现这种情况？难道`fillRect()` 不是 `rect()` 和 `fill()` 的叠加吗？
- `.fillRect()` 是一个**独立**的命令，它可以勾勒并填充出一个矩形。
如果你把多个`.fillStyle()` 和多个`.fillRect()` 搭配使用，每个矩形都会是离它最近的那个`.fillStyle()` 规定的颜色。比如：
```
ctx.fillStyle="red";
ctx.fillRect(10,10,10,10);  
// filled with red

ctx.fillStyle="green";
ctx.fillRect(20,20,10,10);  
// filled with green

ctx.fillStyle="blue";
ctx.fillRect(30,30,10,10);  
// filled with blue
```
- `.rect()` 是 canvas 路径命令中的一个语句。**路径命令**是你绘制的多个形状的**集合**，它从一个`beginPath()` 开始，直到遇到另一个`beginPath()` 结束，都只算一个路径命令。在每一个集合内，只有最后一个`fillStyle` / `strokeStyle` 才起作用。
```
ctx.beginPath();   // 开启一个路径命令
ctx.fillStyle="red";
ctx.rect(10,10,10,10);
ctx.fillStyle="green";
ctx.rect(20,20,10,10);
ctx.fillStyle="blue";
// 这是最后一个 fillStyle，所以它赢了
ctx.rect(30,30,10,10); 
ctx.fill()
```
&emsp;&emsp;总结：你可以认为`.fillRect()` 内部包含了一个`beginPath()`，所以可以**自动**开启一个新的路径命令。


##CSS3
### CSS3 中过渡和动画的异同
#### Transition vs. Animation
&emsp;&emsp;在 CSS3 中，过渡和动画都可以让元素活动起来，它们的作用看起来差不多，所以很多人学完之后很懵逼，这篇文章就来总结一下它们的相似之处和区别。
#### 相似性
&emsp;&emsp;过渡和动画在很多方面还是有不少共性的，它们都可以：
- 改变元素的某些 CSS 属性
- 设置属性值改变的速率函数
- 规定过渡 / 动画所需的时长
- 编写程序监听过渡 / 动画事件
- CSS 属性的改变是肉眼可见的
#### 区别
&emsp;&emsp;过渡和动画各有各的特性，它们的区别也很明显，主要表现在以下几个方面：如何触发、如何循环播放、呈现效果的复杂程度、使用时语法的严格程度以及如何与 JavaScript 联合使用。下面我们逐一展开。
##### 触发
&emsp;&emsp;过渡和动画最明显的区别就是如何触发它们播放。
- 过渡
&emsp;&emsp;当某些 CSS 属性的值发生**改变**时，视觉上是非常突兀的，而过渡就像黄油一样，可以让整个变化过程变得非常平滑。最典型的应用场景是鼠标悬停（`:hover` 伪类），比如:
![Alt text](./making_smaller_larger.png)
代码如下：
```
img {
	width: 100px;
	transition: width 1s ease;
}
img:hover {
	width: 200px;
}
```
&emsp;&emsp;大家可以试一下加和不加`transition` 在视觉效果上有什么不同。不加的时候像不像一个小宝宝瞬间穿越到18年后变成了一条好汉？而加上的话你就可以看到这个孩子是如何一点一点长高的。前者只有起点和终点，后者有详细的过程。
&emsp;&emsp;第二种触发过渡的方法是通过用 JavaScript 代码来添加或删除类名的方法来改变 CSS 属性值。当然用 JavaScript 代码来添加一个行内样式来改变属性值也可以。
- 动画
&emsp;&emsp;而动画根本就不需要触发机制，一旦动画被定义，它就会**自动**播放，就好像孩子生来就会哭一样。
##### 循环
- 动画
&emsp;&emsp;想要动画循环播放非常简单，只要设置 `animation-iteration-count` 属性就可以了，想播放多少次都没问题。
- 过渡
&emsp;&emsp;过渡就没有这个本事了。过渡的特点是触发一次播放一次，不触发就不播放，想要不停地播放就要不停地触发，典型的“推推动动，拨拨转转”，没有一点主观能动性。如果你非要过渡自动地重复播放，那也不是没有办法，只是比较麻烦一点：你可以监听 `transitionEnd` 事件来达到目的。
##### 关键帧
- 动画
&emsp;&emsp;对于动画来说，在起点和终点之间，你可以通过定义关键帧来对动画进行更为精细的控制。
![Alt text](./start_end_animation.png)
&emsp;&emsp;关键帧的每一步都可以对属性值进行精确的设置，只要步骤足够细致，你会发现我们的 HTML5 简直可以和 flash 媲美！
- 过渡
&emsp;&emsp;而过渡呢？它只是简单地从起点变到终点（如下图所示），对中间变化的过程是无能为力的。所以如果变化比较复杂或是想呈现更精彩绚丽的效果，请毫不犹豫地选择动画吧。
![Alt text](./1545618423956.png)
##### 定义方法
- 过渡
&emsp;&emsp;使用过渡时，每一个发生过渡的属性都要定义清楚，否则该属性就不会有过渡效果。来看下面的代码：
```
#main {
	height: 100px;
	background-color: red;
	transition: background-color 1s ease;
}
#main:hover {
	height: 200px;
	background-color: blue;
}
```
&emsp;&emsp;鼠标悬停时，我改变了两个属性：`height` 和 `background-color`，但是在 `transition` 中只规定了 `background-color`，所以你可以观察到 `height` 并没有发生过渡，而是瞬间变高。如果想要两者都发生过渡，代码就要写成 `transition: height 1s ease, background-color 1s ease;`。
&emsp;&emsp;这时你肯定会想，我是那么婆婆好好的人吗？直接一句 `transition: all 1s ease` 不就“白茫茫大地真干净”了？好一个甩锅侠。你一个 **all** 不当紧，浏览器就要监听所有可能发生改变的属性，所以不要让浏览器猜你的心思了，动动手指直接告诉它吧！
- 动画
&emsp;&emsp;动画的语法要求就没有这么严格了，关键帧的每一步都可以定义一个“前无古人，后无来者”的属性，举个例子：
```
@keyframes slide {
	0% { 
        left: -150px;
    } 
 
    20% { 
        left: 50px; 
        height: 200px;
    } 
 
    80% { 
        left: 200px; 
        height:300px;
    } 
 
    100% { 
        left: 600px; 
        background-color:#FFFFFF;
    } 
}
```
在这个例子中，`background-color` 只在最后一帧出现，`height` 在第一帧和最后一帧都没有出现，但是它们照样能平滑地过渡。

##### 与 JavaScript 联用
&emsp;&emsp;在大多数情况下，过渡 / 动画的起点、终点和中间状态都是事先确定的，所以直接用 CSS 就可以达到目的。但是如果你想要动态地改变某个属性的值，或者某个属性值依赖于计算和外界的输入怎么办？这时候 JavaScript 就要上阵了。
&emsp;&emsp;当然，如果完全依靠  JavaScript  来实现过渡 / 动画有点走极端，开发中常用的是**混合**的方法，即大部分的代码写在 CSS 里面，CSS 实现不了的交给 JavaScript。
- 动画
&emsp;&emsp;当需要使用 JavaScript 的时候，通常是与 **transition** 联合使用。因为动画是非常具体的，关键帧详细地定义了每一个步骤。想要用 JavaScript 去改变某一个关键帧需要进行一系列复杂的操作。
- 过渡
&emsp;&emsp;只要监听的属性值有所改变，就可以应用过渡。而用 JavaScript 改变属性值非常简单，比如：
```
var myElement = document.querySelector("#myElement");
myElement.style.backgroundColor = "333";
```
&emsp;&emsp;在人机交互的场景中，过渡的起点和终点不断发生改变，这时就只能用 JavaScript 来设置属性值。具体的使用方法参见这篇文章：<https://www.kirupa.com/snippets/move_element_to_click_position.htm>
#### 结论
&emsp;&emsp;我们总结了过渡和动画的相似和不同之处。究竟选用哪一种，还要看情况：
- 如果需要多个关键帧、绚丽的效果、循环多次播放，那就选用动画。
- 如果只是简单地从起点到终点，那就用过渡。
- 如果需要用 JavaScript 改变属性值，选过渡就对了。

&emsp;&emsp;想必现在你对过渡和动画已经有了更深层次的理解，如果还有其他见解欢迎加入讨论。
来源：https://www.kirupa.com/html5/css3_animations_vs_transitions.htm









#### H5是一个技术合集，H5指的不是HTML5，而是某种在微信等移动端看上去酷炫能够提升公司格调顺便亮瞎访问者氪金狗眼顿升膜拜之心就算没有内容也能被广泛转发分享的一种东西。