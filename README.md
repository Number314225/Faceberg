Faceberg
====================

> ~~其实我就是想随便写个ReadMe文件 试试MarkDown练练手~~
> ### 目录
> * [简介](#简介)
> * [数据库表](#数据库表)
>	* 用户表
>	* 好友列表
>	* 好友申请表
>	* 聊天信息表
> * [未完成的内容](#未完成的内容)
>	* 调式和发布
>	* 路径问题

****

## 简介

	一个简单的聊天室网站（半成品、上交用)
    
## 数据库表

##### 1、用户表 xuser

| 键名      | 类型          | 备注        |
|:--------- |:------------ | :---------- |
| id        | tinyint      | 用户ID      |
| email     | nvarchar(30) | 注册邮箱地址 |
| password  | nvarchar(30) | 密码        |
| name      | nvarchar(20) | 姓名或昵称   |
| sex       | tinyint      | 性别        |
| avatarImg | nvarchar(20) | 头像路径     |
| frndCnt   | tinyint      | 好友数量     |
| signTime  | nvarchar(20) | 注册时间     |

##### 2、好友列表(每个用户一个) usr+id+frnd (如usr12frnd表示用户id为12的人的好友列表)
	
	一直想试一试这种用户ID与表名有联系的方法，在获取好友列表时通过用户ID来决定查询哪个表而不是在一张表内

| 键名      | 类型          | 备注        |
|:--------- |:------------ | :---------- |
| id        | tinyint      | 该表自身ID   |
| frndID    | tinyint      | 好友ID      |

##### 3、好友申请表 applyfrnd

| 键名      | 类型          | 备注        |
|:--------- |:------------ | :---------- |
| id        | int(10)      | 表自身ID    |
| frmUsr    | int(10)      | 申请者ID    |
| toUsr     | int(10)      | 被申请者ID  |
| applyTime | nvarchar(20) | 申请时间    |
| applyInfo | nvarchar(20) | 问候消息    |

##### 4、聊天信息表

	其实这个应该设计成多个表，通过两个用户的ID来决定查询那个表，希望以后有机会填了这个坑....

| 键名      | 类型          | 备注        |
|:--------- |:------------ | :---------- |
| id        | int(10)      | 表自身ID    |
| frmID     | int(10)      | 发送者ID    |
| toID      | int(10)      | 接收者ID    |
| msg       | nvarchar(600)| 消息内容    |
| sendTime  | nvarchar(20) | 发送时间    |


## 未完成的内容

#### 1、调试和发布

	我一定会填这个坑的


#### 2、路径问题

	由于在整理的过程中复制黏贴文件不当，和在敲代码时为了方便调试而留下的另一个坑

[backToTop](#faceberg)
