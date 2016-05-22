function InitConf() {
  var userList={
    zhuangsd:{
        code:"zhuangsd",
        name:"庄少东",
        sex:"男",
        type:"programmers",
        remark:"屌丝程序员需要关爱！",
      },
      huangh:{
        code:"huangh",
        name:"黄虎",
        sex:"男",
        type:"programmers",
        remark:"C#高级开发！"
      },
      suib:{
        code:"suib",
        name:"随波",
        sex:"男",
        type:"testors",
        remark:"傻波。。。"
      },
    count:3,
  };
  var taskList={
    "20160521-0001":{
      task_id:"20160521-0001",
      task_name:"广州实地测试项目",
      type:"BUG"
    },
    "20160521-0002":{
      task_id:"20160521-0002",
      task_name:"典型功能包插件",
      type:"需求"
    }
  };
  

  var defaultObj={
    UserList:userList,
    TaskList:taskList
  };
  return defaultObj;
}

var _selfData=InitConf();