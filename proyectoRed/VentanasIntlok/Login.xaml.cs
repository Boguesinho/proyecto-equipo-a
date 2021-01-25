using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using RestSharp;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Shapes;
using proyectoRed.Models;

namespace proyectoRed.VentanasIntlok
{
    /// <summary>
    /// Lógica de interacción para Login.xaml
    /// </summary>
    public partial class Login : Window
    {
        public Login()
        {
            InitializeComponent();
        }

        private bool validacion()
        {
            if (txtBox_Password.Password.Length > 0 && txtBox_Usuario.Text.Length > 0)
            {
                return true;
            }
            return false;
        }

        private void btn_Ingresar_Click(object sender, RoutedEventArgs e)
        {
            if (validacion())
            {
                var client = new RestClient("http://192.168.100.15:80");

                LoginRequest loginRequest = new LoginRequest();
                loginRequest.User = txtBox_Usuario.Text;
                loginRequest.Password = txtBox_Password.Password;

                var request = new RestRequest("login", Method.POST);
                request.AddBody(loginRequest);

                IRestResponse response = client.Execute(request);
                var content = response.Content;

                RestResponse<LoginResponse> response2 = client.Execute<LoginResponse>(request);
                var token = response2.Data.Token;
            }
        }
    }
}
