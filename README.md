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
>	* 路径也存在一些问题

****

### 简介
`一个简单的聊天室网站（半成品、上交用`
    
### 数据库表

##### 1、用户表 user

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

##### 2、好友列表(每个用户一个) frndList

| 键名      | 类型          | 备注        |
|:--------- |:------------ | :---------- |
| id        | tinyint      | 对方ID      |


### 未完成的内容
`(~~懒得去完成的内容)`

without
----------------------------------------	
用户好友表(每个用户一个)
	id			对方ID
	
好友申请表
	frmID		申请方ID
	toID		接收方ID
	rcvTime		申请方申请时间(年月日时分秒)
	
聊天信息表
	frmID		发送方ID
	toID		接收方ID
	msgStr		消息字符串
	msgTime		发送时间(年月日时分秒)

```diff
+ 多一事
- 少一事
```

[backToTop](#faceberg)
