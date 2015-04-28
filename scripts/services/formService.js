app.factory('formService', function(){
	var errors = {
		1: 'Не удалось загрузить файл по адресу: ',
		2: 'Не удалось подключиться к базе данных',
		3: 'Неправильный логин',
		4: 'Неправильный пароль',
		5: 'Неопознаное событие',
		6: 'Введите корректный логин'
	};
	return {
		errorFunction: function(errorId, output, url){
			if(url !== undefined){ errors[1] += url; }
			if(output.scope !== undefined){
				output.scope.error = errors[errorId];
				output.scope.errorShow = true;
			}
			else{ this.consoleShowData(output, errors[errorId]);
			}
		},
		consoleShowData: function(output, error){
			if(error == undefined){
				console.log(output.dependency.controller + ' -> ' + output.dependency.event + ' success:');
				console.dir(output.data);
			}
			else{ console.log(output.controller + ' -> ' + output.event + ' error: ' + error); }
		},
		checkEmpty: function(element){
			if($(element).val().length > 0){ return false; }
			else{ return true; }
		}
}
});