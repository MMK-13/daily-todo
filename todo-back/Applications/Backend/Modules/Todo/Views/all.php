<?php
	$data = [];

	foreach ($boards as $board) {
		$data['boards'][]['date'] = date('d.m.Y', strtotime($board['Date']));
	}
	foreach ($tasks as $key => $task) {
		$data['tasks'][$key]['id'] = $task['RefTodo'];
		$data['tasks'][$key]['title'] = $task['Title'];
		$data['tasks'][$key]['content'] = $task['Content'];
		$data['tasks'][$key]['parent'] = date('d.m.Y', strtotime($task['Date']));
		$data['tasks'][$key]['hour'] = date('H:i', strtotime($task['Hour']));
		$data['tasks'][$key]['color'] = $task['Color'];
		$data['tasks'][$key]['status'] = $task['Status'];
		$data['tasks'][$key]['category'] = $task['Category'];
	}

	foreach ($categories as $category) {
		$data['categories'][] = [
			'id' => $category['RefCategory'],
			'name' => $category['Category'],
			'color' => $category['Color']
		];
	}
	foreach ($statues as $status) {
		$data['statues'][] = [
			'id' => $status['RefStatus'],
			'name' => $status['Status']
		];
	}

	echo json_encode($data);