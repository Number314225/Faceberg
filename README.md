	键名		备注
用户表 user
	id			ID
	email		邮箱-------------
	password	密码-------------
	name		用户名(for chat)----------			不超过20个字符(10个中文字或20个英文字)
	sex			性别
	avatarImg	头像文件名
	frndCnt		好友数
	signTime	注册时间(年月日时分秒)----------
	
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