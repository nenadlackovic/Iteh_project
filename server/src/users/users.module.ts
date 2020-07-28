import { Module } from '@nestjs/common';
import {TypeOrmModule} from "@nestjs/typeorm";
import { UsersController } from './users.controller';
import { UsersService } from './users.service';
import {Korisnik} from "../entity/Korisnik.entity";

@Module({
    imports: [TypeOrmModule.forFeature([Korisnik])],
    controllers: [UsersController],
    providers: [ UsersService],
    exports: [UsersService]
})
export class UsersModule {}