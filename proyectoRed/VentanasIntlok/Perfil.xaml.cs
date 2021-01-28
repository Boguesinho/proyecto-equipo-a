using Microsoft.Win32;
using Newtonsoft.Json;
using proyectoRed.Models;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para Perfil.xaml
    /// </summary>
    public partial class Perfil : UserControl
    {
        private string info;
        BitmapImage bitmap;
        private bool bandImg=false;
        public Perfil()
        {
            InitializeComponent();
            txt_usuario.Content = Constant.username;
        }

        private void buscarDatosPerfil()
        {

            var client2 = new RestClient(Constant.url);

            var request = new RestRequest("getCuenta",Method.GET);
            request.AddParameter("token",Constant.authToken);


            IRestResponse response2 = client2.Execute(request);
            var content2 = response2.Content;

            dynamic jsonResponse = JsonConvert.DeserializeObject(content2);

            dynamic jsonObject = jsonResponse.MRData.CircuitTable;
            string info = (string)jsonObject.info;
            System.Console.WriteLine(jsonObject);


            txt_Info.Text = info;
        }


        private void BtnSalir_Click(object sender, RoutedEventArgs e)
        {
            Application.Current.Shutdown();
        }
        private void btn_Continuar_Click(object sender, RoutedEventArgs e)
        {
            if (validacion())
            {

                var client = new RestClient(Constant.url);

                if (bandImg)
                {

                    var request = new RestRequest("subirFotoPerfil", Method.POST);

                    request.AddParameter("ruta", bitmap);
                    request.AddParameter("token", Constant.authToken);

                    IRestResponse response = client.Execute(request);
                    var content = response.Content;


                    var request2 = new RestRequest("editInfo", Method.POST);
                    request2.AddParameter("info", txt_Info.Text);

                    IRestResponse response2 = client.Execute(request2);
                    var content2 = response2.Content;
                }
                else
                {
                    var request2 = new RestRequest("editInfo", Method.POST);
                    request2.AddParameter("info", txt_Info.Text);

                    IRestResponse response2 = client.Execute(request2);
                    var content2 = response2.Content;

                }
            }
            else
            {
                MessageBox.Show("Escriba su estado");
            }
        }

        private bool validacion()
        {
            if (txt_Info.Text.Length == 0)
            {
                return false;
            }
            return true;
        }

        private void btn_cambiarFoto_Click(object sender, RoutedEventArgs e)
        {
            OpenFileDialog seleccionar = new OpenFileDialog();
            seleccionar.Filter = "Imagenes|*.jpg; *.png";
            seleccionar.Title = "Seleccionar imagen";

            if (seleccionar.ShowDialog() == true)
            {
                var imgName=seleccionar.SafeFileName;
                var img = seleccionar.FileName;


                Uri file = new Uri(img);
                bitmap = new BitmapImage(file);

                img_ImgenPerfil.Source = bitmap;

                bandImg = true;
            }
        }
    }
}
