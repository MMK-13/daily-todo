<?php
	namespace Applications\Backend\Modules\Todo;

	class TodoController extends \Library\BackController {
		public function executeAll(\Library\HTTPRequest $request) {
			$managers = $this->managers->getManagerOf('Todo');
			$boards = $managers->boards();
			$tasks = $managers->tasks();
			$categories = $managers->categories();
			$statues = $managers->statues();

			$this->page()->addVar('boards', $boards);
			$this->page()->addVar('tasks', $tasks);
			$this->page()->addVar('categories', $categories);
			$this->page()->addVar('statues', $statues);
		}
		public function executeAddTodo(\Library\HTTPRequest $request) {
			if ($request->method() == 'POST') {
				$_POST = json_decode(file_get_contents('php://input'), true);
				$this->managers->getManagerOf('Todo')->addTodo(
					$request->postData('date'),
					$request->postData('hour'),
					$request->postData('title'),
					$request->postData('content'),
					$request->postData('category')
				);
				$this->page()->addVar('data', [
					'code' => 200,
					'message' => 'Todo was successfully saved!'
				]);
			} else {
				$this->app()->httpResponse()->redirect404();
			}
		}
		public function executeAddCategory(\Library\HTTPRequest $request) {
			if ($request->method() == 'POST') {
				$_POST = json_decode(file_get_contents('php://input'), true);
				$this->managers->getManagerOf('Todo')->addCategory(
					$request->postData('category'),
					$request->postData('color')
				);
				$this->page()->addVar('data', [
					'code' => 200,
					'message' => 'Category was successfully saved!'
				]);
			} else {
				$this->app()->httpResponse()->redirect404();
			}
		}
		public function executeDeleteCategory(\Library\HTTPRequest $request) {
			$this->managers->getManagerOf('Todo')->deleteCategory(
				$request->getData('id')
			);
			$this->page()->addVar('data', [
				'code' => 200,
				'message' => 'Category was successfully deleted!'
			]);
		}
		public function executeChangeTodoDate(\Library\HTTPRequest $request) {
			if ($request->method() == 'POST') {
				$_POST = json_decode(file_get_contents('php://input'), true);
				$date = explode('.', $request->postData('date'));
				$this->managers->getManagerOf('Todo')->updateTodoDate(
					$request->postData('task'),
					($date[2].'-'.$date[1].'-'.$date[0])
				);
				$this->page()->addVar('data', [
					'code' => 200,
					'message' => 'Todo Date was successfully updated!'
				]);
			} else {
				$this->app()->httpResponse()->redirect404();
			}
		}
		public function executeDeleteTodo(\Library\HTTPRequest $request) {
			$this->managers->getManagerOf('Todo')->deleteTodo(
				$request->getData('id')
			);
			$this->page()->addVar('data', [
				'code' => 200,
				'message' => 'Todo was successfully deleted!'
			]);
		}
		public function executeDoneTodo(\Library\HTTPRequest $request) {
			$this->managers->getManagerOf('Todo')->doneTodo(
				$request->getData('id')
			);
			$this->page()->addVar('data', [
				'code' => 200,
				'message' => 'Todo status\' was successfully set on "done"!'
			]);
		}
	}