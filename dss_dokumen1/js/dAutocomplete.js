/*! Jquery-Ajax-Autocomplete - v192.168.1.211 - 2016-06-14
* Copyright (c) 2016; */

$.extend ({
	dAutocomplete : function(options){
		
		var A = $.extend( {
				'target' 			: '',
				'min_length'		: 1,
				'main_url'			: "",
				'get_data'			: "",
				'is_save'			: false,
				'to_save'			: "",
				'attr'				: "",
				'oAttr'				: "",
				'is_roster'			: false,
			}, options);


		var _target = $(A.target),
			_minLength = A.min_length,
			_getUrl = A.main_url,
			_saveUrl = A.main_url+A.to_save,
			_elem = '#auto-content',
			_toSelect = ".auto-result-show",
			_keyWord = '',
			_ajax,
			_isDone = false,
			_isClick = true,
			_preloader = '<span class="preloader"><i class="fa fa-spinner fa-spin text-red"></i></span>';

		_target.keyup(function(e){
			_isClick = true;
			if(_ajax){
				_isDone = false;
				_ajax.abort();
			}

			_keyWord = _target.val();

			if(_keyWord.length > _minLength){
				if($(".preloader").length == 0){
					_target.parent().before(_preloader);
				}

				_ajax = $.ajax({
			            async : true,
			            cache : false,
			            data : {query : _keyWord},
			            dataType : "json",
			            type : "post",
			            url : _getUrl,
			            success : function(data){
			            	_drawElement();

			              if(data.length > 0){
			                $.each(data, function(key, val){
			                  $(_elem).append(val);
			                  _checkVisibility();
			                });
			                $(_elem).fadeIn("normal");
			                $(".preloader").remove();
			              }else{
			                _noData();
			              }

			              _selectResultShow();
						  _isDone = true;
			            }
        			});
			}else{
				$(_elem).empty();
				$(_elem).fadeOut("normal");
			}
		});

		_target.keydown(function(e){
			if(_ajax){
				_ajax.abort();
			}
		});

		function _drawElement(){
			if(!$(_elem).length){
				_target.after('<div id="auto-content"></div>');
			}else{
				$(_elem).empty();
			}
		}

		function _noData(){
			$(_elem).html('<strong class="no-data-result">Data tidak ditemukan...!</strong>');
			$(_elem).fadeIn("normal");
		}

		function _selectResultShow(){
      //Bind click event to list elements in results
      $(_toSelect).click(function(e){
        e.preventDefault();
        var _idx = $(this).index(_toSelect);

        var _value = $(_toSelect).eq(_idx).attr('value'); // get attr value
        _target.val(_value);
        $(_elem).fadeOut("normal");
        _isDone = false;
        A.done.call(1, 1);
        _isClick = false;
      });
    }

    function _checkVisibility(){
      if(!$(_elem).is(":visible")){
        $(_elem).fadeIn("normal");
      }
    }

		$(document).mouseup(function (e){
		  var container = $(_elem),
		      main_con = _target;
			if (!container.is(e.target) // if the target of the click isn't the container...
		      && container.has(e.target).length === 0) // ... nor a descendant of the container
		  {
				if(_isClick){
					container.fadeOut("normal");  
		      if(_ajax){
						_isDone = false;
		      	_ajax.abort();
		      	A.done.call(1, 0);
		      }else if(_isDone){
						A.done.call(1, 0);
		      }
		  	}
		  }
			$(".preloader").remove();
    });

	},   
});