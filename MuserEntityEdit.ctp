<?php
    public function userEntityEdit($data, $groupType, $type, $loginUser, $isAdd, $id)
    {
        $groups = [
            "soukatu{$groupType}",
            "kenkyo{$groupType}",
            "system{$groupType}",
            "kintai{$groupType}"
        ];
        $users = null;
        foreach($groups as $group)
        {
            $this->log($group, LOG_DEBUG);
            $this->log("---data[group]---", LOG_DEBUG);
            $this->log($data[$group], LOG_DEBUG);
            if(!empty($data[$group][0]))
            {
                foreach($data[$group] as $user)
                {
                    $this->log("---foreach data[group] as user---", LOG_DEBUG);
                    $this->log($user, LOG_DEBUG);
                    $users[] = $user;
                }
            }
        }
        $this->log("---追加する private user---", LOG_DEBUG);
        $this->log($user, LOG_DEBUG);
        if($users != null)
        {
            $type = "{$type}Save";
            $this->$type($users, $id, $loginUser, $isAdd);
        }
    }
