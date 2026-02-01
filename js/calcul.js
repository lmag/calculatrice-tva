window.onload = init;

function $(id)
{
	return document.getElementById(id);
}
function init()
{
	$('ht').focus();
}
function forceValidFloat(n)
{
    if(n.length == 0) return '';
    var valids = '0123456789';
    var hasDot = false;
    var r = '';
    var c;
    for(var i = 0; i < n.length; ++i)
    {
        c = n.charAt(i);
        if((c == '.' || c == ',') && !hasDot)
        {
            r += (r.length == 0) ? '0.' : '.';
            hasDot = true;
        }
        else if(valids.indexOf(c) != -1)
        {
            r += c;
        }
    }

    return r;
}
function converthttotva()
{
	if ($('taux').value == '')
	{
	}
	else
	{
		if ($('ht').value == '')
		{
			$('tva').value='';
			$('ttc').value='';
		}
		else
		{
			$('ttc').value = '';
			if($('ht').value.length > 9) $('ht').value = $('ht').value.substr(0, 9);
			var temp = forceValidFloat($('ht').value);
			if(temp.length == 0) return;
			if(temp.charAt(temp.length-1) != '.' && temp.charAt(temp.length-1) != '0')
				temp = (Math.round(parseFloat(temp)*100)/100)%100000;
			$('ht').value = temp;
			$('ttc').value = Math.round(parseFloat($('ht').value)*(1+parseFloat($('taux').value)/100)*100)/100;
			$('tva').value=(Math.round((parseFloat($('ttc').value)-temp)*100)/100);
		}
	}
}
function converttvatoht()
{
	if ($('taux').value == '')
	{
	}
	else
	{
		if ($('ttc').value == '')
		{
			$('tva').value='';
			$('ht').value='';
		}
		else
		{
			$('ht').value = '';
			if($('ttc').value.length > 9) $('ttc').value = $('ttc').value.substr(0, 9);
			var temp = forceValidFloat($('ttc').value);
			if(temp.length == 0) return;
			if(temp.charAt(temp.length-1) != '.' && temp.charAt(temp.length-1) != '0')
				temp = (Math.round(parseFloat(temp)*100)/100)%100000;
			$('ttc').value = temp;
			$('ht').value = Math.round(parseFloat($('ttc').value)/(1+parseFloat($('taux').value)/100)*100)/100;
			$('tva').value=(Math.round((temp-parseFloat($('ht').value))*100)/100);
		}
	}
}
function gettva()
{
		if ($('taux').value == '')
		{
		}
		else
		{
			if ($('tva').value == '')
			{
				$('ht').value = '';
				$('ttc').value = '';
			}
			else
			{	
				$('ht').value = Math.round(parseFloat($('tva').value)/(parseFloat($('taux').value)/100)*100)/100;
				$('ttc').value = Math.round((parseFloat($('tva').value)
													+ parseFloat($('ht').value))*100)/100;
			}
		}
}
function modiftaux()
{
	if($('ht').value == '')
	{
	}
	else
	{
		if($('taux').value == '')
		{
			$('ttc').value = '';
		}
		else
		{
			$('ttc').value = Math.round(parseFloat($('ht').value)*(1+parseFloat($('taux').value)/100)*100)/100;
			$('tva').value=(Math.round((parseFloat($('ttc').value)-parseFloat($('ht').value))*100)/100);
		}
	}
}
function effacer(id)
{
	if (id == "effacerht")
	{
		$('ht').value = '';
		$('ht').focus();
	}
	else
	{
		if (id == "effacertva")
		{
			$('tva').value = '';
			$('tva').focus();
		}
		else
		{
			$('ttc').value = '';
			$('ttc').focus();
		}
	}
}

function txtva(id)
{	

	if (id == "tva21")
	{
		$('taux').value = "2.1";
		$('ht').focus();
		modiftaux();
	}
	else
	{
		if (id == "tva55")
		{
			$('taux').value = "5.5";
			$('ht').focus();
			modiftaux();
		}
		else
		{
		
			if (id == "tva7")
		{
			$('taux').value = "7";
			$('ht').focus();
			modiftaux();
		}else{
			$('taux').value = "20";
			$('ht').focus();
			modiftaux();
			}
		}
		
	}
}


function testmail(mailteste)
{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test(mailteste))
	{
		return(true);
	}
	else
	{
		return(false);
	}
}
function email()
{
	if ($('ht').value != '' || $('tva').value != '' || $('ttc').value != '')
	{
		if (testmail($('tmail').value))
		{
			document.envoi_mail.submit();
		}
		else
		{
			alert('Veuillez taper un email valide');
			$('tmail').focus();
		}
	}
	else
	{
		alert('Il n\'y a rien à envoyer.');
	}
}
function favoris() 
{
	if ( navigator.appName != 'Microsoft Internet Explorer' )
	{ window.sidebar.addPanel("Calculatrice TVA","http://www.calculatrice-tva.com",""); }
	else { window.external.AddFavorite("http://www.calculatrice-tva.com","Calculatrice TVA"); }
}