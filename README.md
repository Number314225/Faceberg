Faceberg
=============================

### 一、简介
    一个简单的聊天室网站（半成品、上交用）

### 二、数据库表如下(MySQL)

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

### 复选框列表
- [x] 需求分析
- [x] 系统设计
- [x] 详细设计
- [ ] 编码
- [ ] 测试
- [ ] 交付

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

```diff dddd
