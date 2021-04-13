package br.com.medictools;

import org.testng.Assert;
import org.testng.annotations.Test;

import static com.codeborne.selenide.Selenide.*;
import static com.codeborne.selenide.WebDriverRunner.isChrome;

public class PageLogin {

    @Test
    public void OnAir(){
        isChrome();
        open("http://localhost/medictools/");
        Assert.assertEquals(title(),"MEDICTOOLS - SISTEMA DE GESTÃO DE CLINICAS");
    }
    @Test
    public void VerificandoUsuarioLogado(){
        isChrome();
        open("http://localhost/medictools/");
        $("input");





    }

}
