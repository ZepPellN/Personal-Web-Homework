
-- 用户表
CREATE TABLE user (
    id varchar(64) PRIMARY KEY AUTOINCREMENT ,
    name varchar(64),
    pass varchar(64),
    email varchar(64),
    today_goal_distance double DEFAULT 0,          -- 今日运动目标/公里
    today_goal_step double DEFAULT 0,              -- 今日目标运动步数
    today_goal_time double DEFAULT 0,              -- 今日你目标运动时间/小时
    today__goal_calorie double DEFAULT 0,           -- 今日目标运动消耗卡路里
    week_goal_distance double DEFAULT 0,          -- 本周运动目标/公里
    week_goal_step double DEFAULT 0,              -- 本周目标运动步数
    week_goal_time double DEFAULT 0,              -- 本周目标运动时间/小时
    week_goal_calorie double DEFAULT 0,           -- 本周目标运动消耗卡路里
    total_goal_distance double DEFAULT 0,          -- 终极运动目标/公里
    total_goal_step double DEFAULT 0,              -- 终极目标运动步数
    total_goal_time double DEFAULT 0,              -- 终极目标运动时间/小时
    total_goal_calorie double DEFAULT 0,           -- 终极目标运动消耗卡路里
    avatar varchar(64) DEFAULT "../../images/zsq.jpg",
    sex integer DEFAULT 0,          -- 0:男;1:女
    birthday DATETIME_INTERVAL_CODE ,  --生日
    province text,
    city text,
    motto text,                     -- 个人简介
    point integer DEFAULT 0,
    level integer DEFAULT 0,
    day_step integer DEFAULT 0,
    day_time integer DEFAULT 0,
    day_distance integer DEFAULT 0,
    day_calorie integer DEFAULT 0,
    week_time integer DEFAULT 0,
    week_step integer DEFAULT 0,
    week_distance integer DEFAULT 0,
    week_calorie integer DEFAULT 0,
    run_step integer DEFAULT 0,      --运动总步数/步
    run_time integer DEFAULT 0,     -- 运动总时间/天
    run_distance integer DEFAULT 0, -- 运动总距离/公里
    run_calorie integer DEFAULT 0,  --运动消耗总卡路里
    UNIQUE (name)
);

-- 用户健康表
CREATE TABLE user_health(
    id integer PRIMARY KEY AUTOINCREMENT ,
    uid varchar(64),
    create_date date DEFAULT (datetime('now', 'localtime')),
    height double DEFAULT 0,
    weight double DEFAULT 0,
    walking_step double DEFAULT 0,
    running_step double DEFAULT 0,
    hr integer DEFAULT 0,         -- 心率
    bph integer DEFAULT 0,        -- 收缩压
    bpl integer DEFAULT 0       -- 舒张压
);

CREATE TABLE user_sport(
  id integer PRIMARY KEY AUTOINCREMENT ,
  uid varchar(64),
  create_date date DEFAULT (datetime('now','localtime')),
  run_distance double DEFAULT 0,
  run_step double DEFAULT 0,
  run_time double DEFAULT 0,
  run_calorie double DEFAULT 0
);

CREATE TABLE day_goal(
  id integer PRIMARY KEY AUTOINCREMENT,
  uid integer,
  create_date date DEFAULT (datetime('now','localtime')),
  distance double DEFAULT 0,
  time double DEFAULT 0,
  step double DEFAULT 0,
  calorie double DEFAULT 0
);


-- 活动表
CREATE TABLE activity (
    id integer PRIMARY KEY AUTOINCREMENT ,
    title varchar(64),
    start_time datetime DEFAULT (datetime('now', 'localtime')),
    end_time datetime DEFAULT(datetime('now','localtime')),
    place varchar(128),
    info text,                      -- 活动描述
    bonus varchar(128),
    sponsor varchar(128),
    level integer DEFAULT 0,
    num integer DEFAULT 0         -- 参与人数
);

-- 用户参加活动表
CREATE TABLE user_activity (
    uid varchar(64),
    aid varchar(64)
);

CREATE TABLE  pk_race(
    id integer PRIMARY KEY AUTOINCREMENT ,
    title varchar(64),
    start_time datetime DEFAULT (datetime('now', 'localtime')),
    end_time datetime DEFAULT(datetime('now','localtime')),
    place varchar(128),
    info text,                      -- 活动描述
    bonus text,
    sponsor text,
    leader text,
    level integer DEFAULT 0,
    num integer DEFAULT 0          -- 参与人数
);

CREATE TABLE Multiple_race(
  id integer PRIMARY KEY AUTOINCREMENT ,
  title varchar(64),
  start_time datetime DEFAULT(datetime('now','localtime')),
  end_time datetime DEFAULT (datetime('now','localtime')),
  place varchar(128),
  info text,
  bonus text,
  sponsor text,
  leader text,
  level integer DEFAULT 0,
  num integer DEFAULT 0
);

CREATE TABLE user_race(
  uid varchar(64),
  rid varchar(64)
);


-- 动态
CREATE TABLE moments (
    id integer PRIMARY KEY AUTOINCREMENT ,
    uid varchar(64),
    mdate datetime DEFAULT (datetime('now', 'localtime')),
    content text
);

CREATE TABLE followers(
    uid varchar(64),
    uname varchar(64)
);

CREATE TABLE following(
  uid varchar(64),
  uname varchar(64)
);

CREATE TABLE friend(
  uid varchar(64),
  uname varchar(64)
);

INSERT INTO user(name,pass,email,sex,birthday,province,city,motto) VALUES ('Zhang J.K.','123456','283633780@qq.com',0,"1988-02-16",'Shandong','Qingdao','Just King');