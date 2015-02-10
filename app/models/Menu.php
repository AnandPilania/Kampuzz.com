<?php

class Menu {

    public static $countries = [
        ['name' => 'USA', 'code' => 'us'],
        ['name' => 'UK', 'code' => 'uk'],
        ['name' => 'Canada', 'code' => 'ca'],
        ['name' => 'Australia', 'code' => 'au'],
        ['name' => 'Germany', 'code' => 'ga'],
        ['name' => 'Singapore', 'code' => 'sg'],
        ['name' => 'New Zealand', 'code' => 'nz']
    ];

    public static function getMenu()
    {
        $menu[] = ['name' => 'Home', 'link' => '/'];
        $menu[] = array('name' => 'All Courses', 'link' => 'courses', 'child' => self::subsubMenu(0));
        $menu[] = array('name' => 'Management', 'link' => 'courses/105-management-mba', 'child' => self::subMenu(104));
        $menu[] = array('name' => 'Engineering', 'link' => 'courses/33-engineering-be-btech', 'child' => self::subMenu(1));
        $menu[] = array('name' => 'Exams', 'link' => 'exams', 'child' => self::examMenu(1));
        $menu[] = array('name' => 'Study Abroad', 'link' => 'abroad/courses/USA', 'child' => self::subMenuAbroad());

        return $menu;
    }

    public static function subMenu($parent_id)
    {
        $items = Course::where('parent_course_id', '=', $parent_id)->orderBy('sort', 'DESC')->get();
        $submenu = array();
        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'route' => 'courses'];
        }

        return $submenu;
    }

    public static function subsubMenu($parent_id)
    {
        $items = Course::where('parent_course_id', '=', $parent_id)->orderBy('sort', 'DESC')->get();
        $submenu = array();
        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'route' => 'courses', 'child' => self::subMenu($item->course_id)];
        }

        return $submenu;
    }

    public static function examMenu()
    {
        $items = ExamCategory::has('exams')->get();

        $submenu = array();
        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->id, 'name' => $item->category_name,  'route' => 'exam.category', 'child' => self::examsubMenu($item->id)];
        }

        return $submenu;
    }

    public static function examsubMenu($category_id)
    {
        $items = Exam::whereHas('categories', function ($query) use ($category_id)
        {
            $query->where('exam_category_id', $category_id);
        })->get();

        $submenu = array();
        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->id, 'name' => $item->exam_name,  'route' => 'exam.detail'];
        }

        return $submenu;
    }

    public static function subMenuAbroad()
    {
        $submenu = array();
        $countries = self::$countries;
        foreach ($countries as $country)
        {
            $submenu[] = ['name' => $country['name'],  'route' => 'courses.abroad', 'is_abroad' => true, 'child' => self::subMenuAbroadItems()];
        }

        return $submenu;
    }

    public static function subMenuAbroadItems($id=0)
    {
        $items = AbroadCourse::where('parent_course_id', '=', $id)->orderBy('course_id', 'ASC')->get();
        $submenu = array();

        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'is_abroad' => true,'route' => 'courses.abroad', 'child'=>self::subsubMenuAbroadItems($item->course_id)];
        }

        return $submenu;
    }

    public static function subsubMenuAbroadItems($id=0)
    {
        $items = AbroadCourse::where('parent_course_id', '=', $id)->orderBy('course_id', 'ASC')->get();
        $submenu = array();

        foreach ($items as $item)
        {
            $submenu[] = ['id' => $item->course_id, 'name' => $item->course_name, 'is_abroad' => true, 'route' => 'courses.abroad'];
        }

        return $submenu;
    }
    public static function menuSlug($str)
    {
        return Str::slug(str_replace('All Courses', '', $str));
    }

}