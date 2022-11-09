<template>
	<div class="page">
		<div class="overlay" @click="closeModal"></div>
		<div class="modal">
			<div class="modal__header">
				Параметры задания
				<i class="material-icons" @click="closeModal">close</i>
			</div>
			<div class="modal__footer">
				<button class="btn btn-primary" @click="doneTask">
					<i class="material-icons">check</i>
					Выполнить
				</button>
				<button class="btn btn-danger" @click="deleteTask">
					<i class="material-icons">delete</i>
					Удалить
				</button>
				<button class="btn btn-default" @click="closeModal">
					<i class="material-icons">cancel</i>
					Отменить
				</button>
			</div>
		</div>
	</div>
</template>

<script>
	import { mapGetters, mapActions } from 'vuex'

	export default {
		name: 'TaskOptionModal',
		props: ['task_id', 'status_name'],
		methods: {
			...mapActions(['loadData']),
			closeModal() {
				this.$emit('closed')
			},
			deleteTask() {
				if (confirm('Вы уверены, что хотите удалить его?')) {
					fetch('http://todo.ru/delete-todo/' + this.task_id)
					.then((response) => response.json())
					.then((data) => console.log(data))
					this.loadData()
					this.closeModal()
				}
			},
			doneTask() {
				fetch('http://todo.ru/done-todo/' + this.task_id)
					.then((response) => response.json())
					.then((data) => console.log(data))
					this.loadData()
					this.closeModal()
			}
		},
		computed: {
			...mapGetters(['getStatues']),
			booleanStatus() {
				if (this.status_name === 'done')
					return true
				return false
			},
		},
	}
</script>

<style scoped>
	.page {
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		z-index: 100;
	}
	.overlay {
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		z-index: 101;
		background-color: #000;
		opacity: .5;
	}
	.modal {
		z-index: 102;
		position: relative;
		margin: 80px auto;
		background-color: #FFF;
		width: 480px;
		color: #0A0A0A;
		border-radius: 4px;
	}
	.modal__header {
		display: flex;
		flex-direction: row;
		justify-content: space-between;
		padding: 8px 16px;
		background-color: var(--secondary-color);
		color: #FFF;
		font-weight: 700;
		font-size: 18px;
		border-top-left-radius: 4px;
		border-top-right-radius: 4px;
	}
	.modal__header i {
		cursor: pointer;
	}
	.modal__header i:hover {
		font-weight: 900;
		transform: scale(1.1);
	}
	.modal__body {
		display: flex;
		flex-direction: row;
		align-items: center;
		gap: 8px;
		padding: 8px 16px;
		font-weight: 500;
	}
	.form-row {
		display: flex;
		flex-direction: column;
		gap: 4px;
		font-size: 16px;
	}
	.form-row__label {
		font-weight: 700;
	}
	.form-row__input {
		padding: 4px 8px;
		width: 16px;
		height: 16px;
	}
	.form-row__input:focus {
		border: 1px solid var(--primary-color);
	}
	.modal__footer {
		display: flex;
		flex-direction: row;
		justify-content: center;
		gap: 16px;
		padding: 16px;
	}
	.btn {
		display: flex;
		flex-direction: row;
		align-items: center;
		gap: 8px;
		padding: 8px 16px;
		border: none;
		border-radius: 4px;
		cursor: pointer;
	}
	.btn-primary {
		background-color: var(--secondary-color);
		color: #FFF;
	}
	.btn-primary:hover {
		background-color: var(--primary-color);
	}
	.btn-danger {
		background-color: #D00;
		color: #FFF;
	}
	.btn-danger:hover {
		background-color: #B00;
	}
	.btn-default {
		background-color: #FAFAFA;
	}
	.btn-default:hover {
		background-color: #CACACA;
	}
</style>