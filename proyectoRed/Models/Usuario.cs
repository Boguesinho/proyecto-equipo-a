using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace proyectoRed.Models
{
    class Usuario
    {
        private string username;
        private DateTime updated_at;
        private DateTime creayed_at;
        private int id;

        public string Username { get => username; set => username = value; }
        public DateTime Updated_at { get => updated_at; set => updated_at = value; }
        public DateTime Creayed_at { get => creayed_at; set => creayed_at = value; }
        public int Id { get => id; set => id = value; }
    }
}
